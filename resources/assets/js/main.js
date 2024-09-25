$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': window.ToDo.csrfToken
        }
    });
    if(localStorage.getItem('access_token')){
        $.ajaxSetup({
            headers: {
                'authorization': `Bearer ${localStorage.getItem('access_token')}`
            }
        });

        $.ajax({
            type: 'POST',
            url: 'api/auth/me',
            success: function (response) {

            },
            error: function (xhr) {

            }
        });
    }

    $('#register_form').on('submit', function(event) {
        event.preventDefault();
        let formData = {
            name: $('#name').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            password_confirmation: $('#password_confirmation').val(),
        };
        $.ajax({
            type: 'POST',
            url: '/api/users/register',
            data: formData,
            success: function(response) {
                $.toast({
                    heading: 'Successfully!',
                    text: response.message,
                    showHideTransition: 'fade',
                    icon: 'success'
                });
                setTimeout(function() {
                    window.location.href = response.returnUrl;
                }, 3000);
            },
            error: function(xhr) {
                let errors = JSON.parse(xhr.responseText);
                for (let field in errors) {
                    for (let message of errors[field]) {
                        $.toast({
                            heading: 'Some Errors!',
                            text: message,
                            showHideTransition: 'fade',
                            icon: 'error'
                        });
                    }
                }
            }
        });
    });

    $('#login_form').on('submit', function(event) {
        event.preventDefault();
        let formData = {
            email: $('#email').val(),
            password: $('#password').val(),
        };
        $.ajax({
            type: 'POST',
            url: '/login',
            data: formData,
            success: function(response) {
                $.toast({
                    heading: 'Successfully!',
                    text: response.message,
                    showHideTransition: 'fade',
                    icon: 'success'
                });
                localStorage.setItem('access_token', response.access_token)
                setTimeout(function() {
                    window.location.href = '/';
                }, 3000);
            },
            error: function(xhr) {
                // Add other errors messages
                let errors = JSON.parse(xhr.responseText);
                $.toast({
                    heading: 'Some Errors!',
                    text: errors.error,
                    showHideTransition: 'fade',
                    icon: 'error'
                });
            }
        });
    });

    $('#addTaskButton').on('click', function() {
        let sidebar = $('#taskDetailsSidebar'),
            mainContent = $('#mainContent');

        $('.fixed_btn_wrap').toggleClass('fixed_btn_wrap-sidebar--shown');
        if (sidebar.hasClass('right-sidebar--shown')) {
            sidebar.removeClass('right-sidebar--shown').addClass('right-sidebar--hidden');
            mainContent.removeClass('reduced-width').addClass('full-width');
        } else {
            sidebar.removeClass('right-sidebar--hidden').addClass('right-sidebar--shown');
            mainContent.removeClass('full-width').addClass('reduced-width');
        }
    });

    if(document.getElementById('date-picker') !== null){
        new tempusDominus.TempusDominus(document.getElementById('date-picker'), {
            display: {
                viewMode: 'calendar',
                components: {
                    clock: false,
                    hours: false,
                    minutes: false,
                    seconds: false,
                    useTwentyfourHour: undefined
                },
            },
            localization: {
                format: 'dd/MM/yyyy',
            }
        });
    }
    if(document.getElementById('time-picker') !== null){
        new tempusDominus.TempusDominus(document.getElementById('time-picker'), {
            display: {
                viewMode: 'clock',
                components: {
                    decades: false,
                    year: false,
                    month: false,
                    date: false,
                    hours: true,
                    minutes: true,
                    seconds: false
                }
            },
            localization: {
                format: 'hh:mm',
            }
        });
    }

});