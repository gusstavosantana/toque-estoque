(function () {
    'use strict'

    const $win = $(window);
    const $doc = $(document);

    const dash = {
        icons() {
            feather.replace();
        },
        handleProduct() {
            const _this = this;
            
            $('.form-product').on('submit', function() {
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
                        
                        Swal.fire({
                            icon: 'success',
                            title: 'Sucesso!',
                            text: 'Produto salvo com sucesso',
                            confirmButtonText: 'Ok'
                        }).then(function() {
                            window.location = window.location.href = json.location;
                        });
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Erro ao cadastrar produto, tente novamente',
                        });

                        _this.enableSubmit('Salvar');
                    }
                });

                return false;
            });
        },
        removeProduct() {
            $('#remove-product').on('click', function(e) {
                e.preventDefault();

                const url = $(this).attr('href');

                Swal.fire({
                    icon: 'warning',
                    title: 'Deseja excluir esse produto?',
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Sim'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            method: 'POST',
                            success: function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Ok!',
                                    text: 'O produto foi removido',
                                    confirmButtonText: 'Ok'
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Erro ao remover o produto, tente novamente',
                                });
                            }
                        });   
                    }
                });             
            });
        },
        disableSubmit() {
            $('.button-submit').attr('disabled', true).text('Aguarde...');
        },
        enableSubmit(text) {
            $('.button-submit').attr('disabled', false).text(text);
        },
        init() {
            this.icons();
            this.handleProduct();
            this.removeProduct();
        }
    }

    $doc.ready(function(){
        dash.init();
    });
})()