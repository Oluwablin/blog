$(document).ready(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    var offsetBlueDiv = $('#blue-div-nav').offset().top;

    var stickyWhiteDiv = function () {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > offsetBlueDiv) {
            $('.hide-and-show').css({ display: "block"});
            $('#blue-div-nav').css({marginTop: '-70px'});
            $('.white-div').addClass('sticky-nav');
        }
        else {
            $('.hide-and-show').css({ display: "none" });
            $('#blue-div-nav').css({ marginTop: '0px' });
            $('.white-div').removeClass('sticky-nav');
        }
    };

    stickyWhiteDiv();
    $(window).scroll(function () {
        stickyWhiteDiv();
    });


    function profilePage() {
        $('li#subscriptions1 a').click(function () {
            // alert('tutufr')
            $('hr').addClass('medium-screen-horizontal');
            // $('.medium-screen-horizontal').not(this).removeClass('medium-screen-horizontal')
        })

        $('li#profile1 a').click(function () {
            // alert('tutufr')
            $('hr').removeClass('medium-screen-horizontal');
            // $('.medium-screen-horizontal').not(this).removeClass('medium-screen-horizontal')
        })
    }
    profilePage()


    function modalContainer() {
        $('.hamburger-outer-div').click(() => {
            $('.modal-nav-container').addClass('open');
            $('#image-slides.slide').carousel('pause');
            $('ul.carousel-indicators').css({ display: 'none' });
        })

        $('#close-btn').click(() => {
            $('.modal-nav-container').removeClass('open');
            $('#image-slides.slide').carousel('cycle');
            $('ul.carousel-indicators').css({ display: 'flex' });
        })
    }
    modalContainer()

    let waitBtn = '<i class="fa fa-spin fa-cog"></i> Please Wait....';
    $(document).on('submit', '.validate-ticket-purchase', function(e) {
        e.preventDefault();
        let _this = $(this)
        let btnElem =_this.find("button[type='submit']")
        let btnVal = btnElem.html()
            btnElem.html(waitBtn).attr('disabled', 'disabled')
        $.ajax({
            url: _this.attr('action'),
            type:"post",
            data:_this.serialize(),
            success:function(response) {
                let paymentForm = $("#process-ticket-purchase");
                paymentForm.find("input[name='amount']").val(response.amount)
                //paymentForm.find("input[name='ticket_qty']").val(response.ticket_qty)
                 paymentForm.trigger('submit');
            },
            error:function(error) {
                if (error.status === 422) {
                    let response = JSON.parse(error.responseText)
                    let message = [];
                    if (response.errors) {
                        $.each(response.errors,function(elem,val){
                            message.push(val[0])
                        })
                        $(".alert").addClass("alert-danger").html(message[0]).show()
                    } else {
                        $(".alert").addClass("alert-danger").html(response.message).show()
                    }

                }
                console.log(error.status);
            },
            complete:function () {
                btnElem.html(`<div class="card-footer text-center"> PURCHASE &#8594; </div>`).removeAttr("disabled")
            }
        })

    })

    Number.prototype.toCurrencyString = function(prefix, suffix) {
        if (typeof prefix === 'undefined') { prefix = ''; }
        if (typeof suffix === 'undefined') { suffix = ''; }
        var _localeBug = new RegExp((1).toLocaleString().replace(/^1/, '').replace(/\./, '\\.') + "$");
        return prefix + (~~this).toLocaleString().replace(_localeBug, '') + (this % 1).toFixed(2).toLocaleString().replace(/^[+-]?0+/,'') + suffix;
    }

    $(document).on('change blur mouseup mousedown keypress keyup', '.ticket_quantity', function() {
        let unitCostString = $(".unit_cost").text().replace(',','')
        let unitCost = parseInt(unitCostString)
        let quantity = $(this).val();
        let totalCost = unitCost * quantity;
        $(".total_cost").text(totalCost.toCurrencyString())
    });

    $(document).on('submit', '.validate-gift-voucher-purchase', function(e) {
        e.preventDefault()

        let _this = $(this);
        let _submitBtn = _this.find("button[type='submit']");
        let btnVal = _submitBtn.html()
            _submitBtn.html(waitBtn)

        $.ajax({
            url:_this.attr('action'),
            type:'post',
            data:_this.serialize(),
            success:function(response) {
                let paymentForm = $("#process-gift-voucher-purchase");
                paymentForm.find("input[name='amount']").val(response.amount)
                paymentForm.find("input[name='recipient']").val(response.email)
                paymentForm.trigger('submit');
                console.log(response)
            },
            error:function(error) {
                if (error.status === 422) {
                    let response = JSON.parse(error.responseText)
                    let message = [];
                    if (response.errors) {
                        $.each(response.errors, function (elem, val) {
                            message.push(val[0])
                        })
                        $(".alert").addClass("alert-danger").html(message[0]).show()
                    } else {
                        $(".alert").addClass("alert-danger").html(response.message).show()
                    }
                } else {
                    $(".alert").addClass("alert-danger").html('Error occurred, Please check connection settings').show()
                }

            },
            complete:function() {
                _submitBtn.html(btnVal)
            }
        })

    })
})

