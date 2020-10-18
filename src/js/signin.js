(function () {
    'use strict'

    const $win = $(window);
    const $doc = $(document);

    const signin = {
        login() {
            const _this = this;
            
            $('.form-signin').on('submit', function() {
                const url = $(this).attr('action');
                const data = $(this).serialize();
                
                $.ajax({
                    url: url,
                    data: data,
                    method: "POST",
                    beforeSend: function() {
                        _this.disableSubmit();
                    },
                    success: function(resp) {
                        const json = JSON.parse(resp);

                        if (json.status) {
                            window.location = window.location.href = json.location;
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Usuário ou senha inválidos',
                            });

                            _this.enableSubmit('Acessar');
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Erro ao efetuar login, tente novamente',
                        })

                        _this.enableSubmit('Acessar');
                    }
                });

                return false;
            });
        },
        register() {
            const _this = this;

            $('.form-register').on('submit', function() {
                const url = $(this).attr('action');
                const data = $(this).serialize();
                
                $.ajax({
                    url: url,
                    data: data,
                    method: "POST",
                    beforeSend: function() {
                        _this.disableSubmit();
                    },
                    success: function(resp) {
                        const json = JSON.parse(resp);

                        if (json.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Parabéns!',
                                text: 'Você foi cadastrado com sucesso',
                                confirmButtonText: 'Ok'
                            }).then(function() {
                                window.location = window.location.href = json.location;
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Esse nome usuário de usuário já existe',
                            });

                            _this.enableSubmit('Cadastrar');
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Erro ao cadastrar, tente novamente',
                        })

                        _this.enableSubmit('Cadastrar');
                    }
                });

                return false;
            });
        },
        disableSubmit() {
            $('.button-submit').attr('disabled', true).text('Aguarde...')
        },
        enableSubmit(text) {
            $('.button-submit').attr('disabled', false).text(text);
        },
        init() {
            this.login();
            this.register();
        }
    }

    $doc.ready(function(){
        signin.init();
    });
})()