var mcompare_app = angular.module('mcompare_app',[]);
mcompare_app.controller("mainCTRL", ['$http', '$scope', function(http, sc){
    sc.imagesBaseURL = mainServerAddress+'images/';
    sc.sideCartItems = [];
    sc.mainCartItems = [];
    sc.userName  = null;

    //IN development function
    (()=>{
        try{
            let IP = localStorage.getItem("ip");
            if ( !IP ){
                var newIP = prompt("Please enter IP Address", "");
                if (newIP != null) {
                    localStorage.setItem("ip",newIP);
                    sc.imagesBaseURL = newIP+'images/';
                    apiBaseURL = newIP+'api/';
                }
            }else {
                sc.imagesBaseURL = IP+'images/';
                apiBaseURL = IP+'api/';
            }
        }
        catch ( e ) {
            console.log(e);
        }
    })();


    //region Homepage Functions
    sc.homepageProducts = {
        "new":null,
        "best":null,
        "special":null,
        "featured":null
    };

    sc.getHomePageItems = async ()=>{
        try{
            let serverResponse = await sendServerRequest(apiBaseURL+'home_page',"GET");
            if ( serverResponse ){
                if ( serverResponse.hasOwnProperty('status') ){
                    checkForSessionExpireCall(serverResponse.status);
                    if ( serverResponse.status==200 ){
                        sc.homepageProducts= serverResponse.data;
                        sc.$digest();

                        // Initializing special product slider
                        $('.product-4').slick({
                            infinite: true,
                            speed: 300,
                            slidesToShow: 4,
                            slidesToScroll:4 ,
                            autoplay: true,
                            autoplaySpeed: 3000,
                            responsive: [
                                {
                                    breakpoint: 1200,
                                    settings: {
                                        slidesToShow: 3,
                                        slidesToScroll: 3
                                    }
                                },
                                {
                                    breakpoint: 991,
                                    settings: {
                                        slidesToShow:2,
                                        slidesToScroll: 2
                                    }
                                },
                                {
                                    breakpoint: 420,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1
                                    }
                                }
                            ]
                        });

                    }
                }
                else throw 'Invalid server response';
            }
            else throw 'No response by server';

        }
        catch (e) {
            console.log(e);
            swal({
                title: "Oops",
                text: "Something not right",
                icon: "error",
                button: "Close",
            });
        }
    };

    sc.addItemToCart = (product)=>{
        var sideCartLocalStorageData = localStorage.getItem("sideCartItems");

        let notify = (text,type)=>{
            $.notify({
                    icon: 'fa fa-check',
                    title: 'Success!',
                    message: text||'Item Successfully added to your cart'
                },
                {
                    element: 'body',
                    position: null,
                    type: type||"success",
                    allow_dismiss: true,
                    newest_on_top: false,
                    showProgressbar: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    delay: 5000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    },
                    icon_type: 'class',
                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                        '<span data-notify="icon"></span> ' +
                        '<span data-notify="title">{1}</span> ' +
                        '<span data-notify="message">{2}</span>' +
                        '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        '</div>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                        '</div>'
                });
        };

        let addItem = ()=>{
            $('#waiting').show();
            setTimeout(async ()=>{
                try{
                    let serverResponse = await sendServerRequest(apiBaseURL+'add_to_cart?id='+product.id,"GET");
                    if ( serverResponse ){
                        if ( serverResponse.hasOwnProperty('status') ){
                            checkForSessionExpireCall(serverResponse.status);
                            if ( serverResponse.status==200 ){
                                sideCartLocalStorageData.push(product);
                                localStorage.setItem('sideCartItems',JSON.stringify(sideCartLocalStorageData));
                                addMainCartItem(serverResponse.data);
                                notify();
                            }
                            else{
                                swal({
                                    title: "Oops",
                                    text: serverResponse.detail,
                                    icon: "error",
                                    button: "Close",
                                });
                            }
                        }
                        else throw 'Invalid server response';
                    }
                    else throw 'No response by server';

                }
                catch (e) {
                    console.log(e);
                    swal({
                        title: "Oops",
                        text: "Something not right",
                        icon: "error",
                        button: "Close",
                    });
                }
                $('#waiting').hide();
            },2000)
        };

        let addMainCartItem = (data)=>{
            try{
                let savedData = localStorage.getItem("mainCartItems");
                if ( savedData ){
                    savedData = JSON.parse(savedData);
                    savedData.forEach(e=>{
                        let productForThisMarket = data.filter(m=>m.market_id===e.market_id);
                        e.product.push(productForThisMarket[0].product[0])
                    });
                    localStorage.setItem("mainCartItems",JSON.stringify(savedData));
                }
                else {
                    // If empty
                    localStorage.setItem("mainCartItems",JSON.stringify(data));
                }
            }
            catch ( e ) {
                console.log(e);
                swal({
                    title: "Oops",
                    text: "Something not right",
                    icon: "error",
                    button: "Close",
                });
            }
        };

        try{
            if ( sideCartLocalStorageData ){
                let alreadyAdded = false;
                sideCartLocalStorageData = JSON.parse(sideCartLocalStorageData);
                sideCartLocalStorageData.forEach(e=>{if ( e.name==product.name ) alreadyAdded = true});
                if ( !alreadyAdded ){
                    addItem();
                }
                else { notify('Already Added','primary'); }
            }
            else {
                sideCartLocalStorageData = [];
                addItem();
            }
        }
        catch ( e ) {
            console.log(e);
            swal({
                title: "Oops",
                text: "Something not right",
                icon: "error",
                button: "Close",
            });
        }

    };
    //endregion

    //region SearchPage Functions
    sc.searchItems = [];
    sc.searchText = '';
    sc.marketDetail = {};

    sc.searchProduct = ()=>{
        if ( !sc.searchText ){return;}

        $('#loading').show();
        $('#not-found').hide();
        sc.searchItems = [];

        setTimeout(async ()=>{
            $('#loading').hide();
            try{
                let serverResponse = await sendServerRequest(apiBaseURL+'search_product?text='+sc.searchText,"GET");
                if ( serverResponse ){
                    if ( serverResponse.hasOwnProperty('status') ){
                        checkForSessionExpireCall(serverResponse.status);
                        if ( serverResponse.status==200 ){
                            sc.searchItems= serverResponse.data;
                            if ( sc.searchItems.length==0 ){
                                $('#not-found').show();
                            }
                            sc.$digest();
                        }
                    }
                    else throw 'Invalid server response';
                }
                else throw 'No response by server';

            }
            catch (e) {
                console.log(e);
                swal({
                    title: "Oops",
                    text: "Something not right",
                    icon: "error",
                    button: "Close",
                });
            }

        },2000);
    };

    sc.getMarketDetail = async ()=>{
        try{
            const urlParams = new URLSearchParams(window.location.search);
            let id = urlParams.get('id') || 1;

            let serverResponse = await sendServerRequest(apiBaseURL+'market?id='+id,"GET");
            if ( serverResponse ){
                if ( serverResponse.hasOwnProperty('status') ){
                    checkForSessionExpireCall(serverResponse.status);
                    if ( serverResponse.status==200 && serverResponse.data[0]){
                        sc.marketDetail= serverResponse.data[0];
                        sc.$digest();
                    }
                }
                else throw 'Invalid server response';
            }
            else throw 'No response by server';

        }
        catch (e) {
            console.log(e);
            swal({
                title: "Oops",
                text: "Something not right",
                icon: "error",
                button: "Close",
            });
        }
    };
    //endregion

    //region CartPage Functions
    sc.initCartPage = ()=>{
        try{
            let data = localStorage.getItem("mainCartItems");
            if ( data ){
                data = JSON.parse(data);
                sc.mainCartItems = data;

                //calculating total
                sc.mainCartItems.forEach(e=>{
                    e.total=0;
                    e.product.forEach(p=>{
                        e.total+=p.price;
                    });
                });

                //finding least
                let leastIndex = 0;
                sc.mainCartItems.forEach((e,i)=>{
                    if ( e.total< sc.mainCartItems[leastIndex]){
                        leastIndex = i;
                    }
                });
                sc.mainCartItems[leastIndex].isLeast = true;
            }
            else {
                sc.mainCartItems = [];
            }


            /*=====================
            09. footer according
            ==========================*/
            setTimeout(()=>{
                var contentwidth = jQuery(window).width();
                if ((contentwidth) < '750') {
                    jQuery('.footer-title h4').append('<span class="according-menu"></span>');
                    jQuery('.footer-title').on('click', function () {
                        jQuery('.footer-title').removeClass('active');
                        jQuery('.footer-contant').slideUp('normal');
                        if (jQuery(this).next().is(':hidden') == true) {
                            jQuery(this).addClass('active');
                            jQuery(this).next().slideDown('normal');
                        }
                    });
                    jQuery('.footer-contant').hide();
                } else {
                    jQuery('.footer-contant').show();
                }

                if ($(window).width() < '1183') {
                    jQuery('.menu-title h5').append('<span class="according-menu"></span>');
                    jQuery('.menu-title').on('click', function () {
                        jQuery('.menu-title').removeClass('active');
                        jQuery('.menu-content').slideUp('normal');
                        if (jQuery(this).next().is(':hidden') == true) {
                            jQuery(this).addClass('active');
                            jQuery(this).next().slideDown('normal');
                        }
                    });
                    jQuery('.menu-content').hide();
                } else {
                    jQuery('.menu-content').show();
                }
            },500);

        }
        catch ( e ) {
            console.log(e);
            swal({
                title: "Oops",
                text: "Something not right",
                icon: "error",
                button: "Close",
            });
        }
    };

    sc.clearCart = () =>{
        let removeCartItems = ()=>{
            localStorage.setItem("sideCartItems","");
            localStorage.setItem("mainCartItems","");
            sc.sideCartItems = [];
            sc.mainCartItems = [];
            sc.$digest();
        };

        swal("This operation will remove all items from your cart", {
            buttons: {
                cancel: "Dismiss",
                doIt: {
                    text: "Do it",
                    value: "doIt",
                }
            },
        }).then((value) => {
            switch (value) {
                case "doIt":
                    removeCartItems();
                    break;
            }
        });
    };
    //endregion

    //region Global Functions
    sc.initSideCart = ()=>{
       try{
            let data = localStorage.getItem("sideCartItems");
            if ( data ){
                data = JSON.parse(data);
                sc.sideCartItems = data;
            }
            else {
                sc.sideCartItems = [];
            }
        }
        catch ( e ) {
            console.log(e);
            swal({
                title: "Oops",
                text: "Something not right",
                icon: "error",
                button: "Close",
            });
        }
    };

    (checkUsername = ()=>{
        try{
            sc.userName = localStorage.getItem("username");
        }
        catch ( e ) {
            swal('something not right');
        }
    })();
    //endregion

    //region LoginPage Functions
    sc.login = () =>{
        if ( !sc.loginEmail || !sc.loginPassword ){
            return;
        }
        $('#waiting').show();
        setTimeout(async ()=>{
            try{
                let data = {
                    "email": sc.loginEmail,
                    "password": sc.loginPassword
                };
                let serverResponse = await sendServerRequest(apiBaseURL+'login',"POST",JSON.stringify(data));
                if ( serverResponse ){
                    if ( serverResponse.hasOwnProperty('status') ){
                        checkForSessionExpireCall(serverResponse.status);
                        if ( serverResponse.status==200 ){
                            window.location.href='index.php';
                            localStorage.setItem("username",serverResponse.name);
                        }
                        else{
                            swal({
                                title: "Oops",
                                text: serverResponse.detail,
                                icon: "error",
                                button: "Close",
                            });
                        }
                    }
                    else throw 'Invalid server response';
                }
                else throw 'No response by server';
            }
            catch (e) {
                console.log(e);
                swal({
                    title: "Oops",
                    text: "Something not right",
                    icon: "error",
                    button: "Close",
                });
            }
            $('#waiting').hide();
        },2000)
    };

    sc.register = () =>{
        if ( !sc.registerFirstName || !sc.registerFirstName || !sc.registerEmail || !sc.registerPassword ){
            return;
        }

        $('#waiting').show();
        setTimeout(async ()=>{
            try{
                let data = {
                    "name":sc.registerFirstName + ' ' + sc.registerLastName,
                    "email": sc.registerEmail,
                    "password": sc.registerPassword
                };
                let serverResponse = await sendServerRequest(apiBaseURL+'register_account',"POST",JSON.stringify(data));
                if ( serverResponse ){
                    if ( serverResponse.hasOwnProperty('status') ){
                        checkForSessionExpireCall(serverResponse.status);
                        if ( serverResponse.status==200 ){
                            swal(serverResponse.detail);
                            setTimeout(()=>{window.location.href='login.php'},1000);
                        }
                        else{
                            swal({
                                title: "Oops",
                                text: serverResponse.detail,
                                icon: "error",
                                button: "Close",
                            });
                        }
                    }
                    else throw 'Invalid server response';
                }
                else throw 'No response by server';
            }
            catch (e) {
                console.log(e);
                swal({
                    title: "Oops",
                    text: "Something not right",
                    icon: "error",
                    button: "Close",
                });
            }

            $('#waiting').hide();
         },2000)
    };
    //endregion

}]);

