(function () {
	"use strict";

	const dash = {
		icons() {
			feather.replace();
		},
		handleProduct() {
			const _this = this;

			$(".form-product").on("submit", function () {
				const url = $(this).attr("action");
				const data = $(this).serialize();

				$.ajax({
					url: url,
					data: data,
					method: "POST",
					beforeSend: function () {
						_this.disableSubmit();
					},
					success: function (resp) {
						const json = JSON.parse(resp);

						Swal.fire({
							icon: "success",
							title: "Sucesso!",
							text: "Produto salvo com sucesso",
							confirmButtonText: "Ok",
						}).then(function () {
							window.location = window.location.href = json.location;
						});
					},
					error: function () {
						Swal.fire({
							icon: "error",
							title: "Oops...",
							text: "Erro ao cadastrar produto, tente novamente",
						});

						_this.enableSubmit("Salvar");
					},
				});

				return false;
			});
		},
		removeProduct() {
			$("#remove-product").on("click", function (e) {
				e.preventDefault();

				const url = $(this).attr("href");

				Swal.fire({
					icon: "warning",
					title: "Deseja excluir esse produto?",
					showCancelButton: true,
					cancelButtonText: "Cancelar",
					confirmButtonText: "Sim",
				}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							url: url,
							method: "POST",
							success: function () {
								Swal.fire({
									icon: "success",
									title: "Ok!",
									text: "O produto foi removido",
									confirmButtonText: "Ok",
								}).then(function () {
									location.reload();
								});
							},
							error: function () {
								Swal.fire({
									icon: "error",
									title: "Oops...",
									text: "Erro ao remover o produto, tente novamente",
								});
							},
						});
					}
				});
			});
		},
		addOrder() {
			$("#add-order").on("click", function (e) {
				e.preventDefault();

				const url = $(this).attr("href");

				$.post(url, function () {
					Swal.fire({
						icon: "success",
						title: "Ok!",
						text: "O pedido foi adicionado",
						confirmButtonText: "Ok",
					}).then(function () {
						location.reload();
					});
				}).fail(function () {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "Erro ao adicionar o pedido, tente novamente",
					});
				});
			});
		},
		addProductOrder() {
			$(".add-product-btn.btn-order").on("click", function (e) {
				e.preventDefault();

				const qtd = $(this).parents(".product-order").find(".input-qtd").val();
				const url = `${$(this).attr("href")}&productQty=${qtd}`;

				$.post(url, function () {
					Swal.fire({
						icon: "success",
						title: "Ok!",
						text: "O produto foi contabilizado no pedido",
						confirmButtonText: "Ok",
					}).then(function () {
						location.reload();
					});
				}).fail(function () {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "Erro ao contabilizar o produto no pedido, tente novamente",
					});
				});
			});
		},
		chartHome() {
			const url = $("#myChart").attr("data-url");
			const data = [];
			const label = [];

			$.get(url, function (resp) {
				const json = JSON.parse(resp);
				const chart = document.getElementById("myChart");

				json.forEach(function (element) {
					data.push(element.valor_pedido);
					label.push(`Pedido #${element.id_pedido}`);
				});

				const myChart = new Chart(chart, {
					type: "line",
					data: {
						labels: label,
						datasets: [
							{
								data: data,
								lineTension: 0,
								backgroundColor: "transparent",
								borderColor: "#007bff",
								borderWidth: 4,
								pointBackgroundColor: "#007bff",
							},
						],
					},
					options: {
						scales: {
							yAxes: [
								{
									ticks: {
										beginAtZero: false,
									},
								},
							],
						},
						legend: {
							display: false,
						},
					},
				});
			});
		},
		disableSubmit() {
			$(".button-submit").attr("disabled", true).text("Aguarde...");
		},
		enableSubmit(text) {
			$(".button-submit").attr("disabled", false).text(text);
		},
		init() {
			this.icons();
			this.handleProduct();
			this.removeProduct();
			this.addOrder();
			this.addProductOrder();
			this.chartHome();
		},
	};

	$(document).ready(function () {
		dash.init();
	});
})();
