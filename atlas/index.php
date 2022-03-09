
<?php 

  /**
   * 
   * 
   * 
   * @description | Exceptions sınıfını dahil ediyoruz
   * @serkankuyu [serkan.kuyu@hotmail.com.tr]
   * @siyahklasor.com/magaza [Pazaryeri Mağaza Simülasyonu]
   * 
   *
   *
   */

  require_once 'classes/Exceptions.php';

  ?>

  <!doctype html>
  	<html lang="tr">
  	<head>
  		<!-- Required meta tags -->
  		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">

  		<!-- Bootstrap CSS -->
  		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  		<!-- Bootstrap Icons -->
  		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


  		<!-- Google Fonts : Inter -->
  		<link rel="preconnect" href="https://fonts.googleapis.com">
  		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


  		<!-- JS -->
  		<script src="assets/js/vue.js?v2.6.12"></script>
  		<script src="assets/js/axios.js?v0.21.0"></script>


  		<!-- Style -->
  		<style type="text/css">

  			[v-cloak] {
  				display: none
  			}

  			:root{
  				--font-name :'Inter', sans-serif;
  				--bg-color:#F5F5F5;
  				--page-color:#FFF;
  			}

  			body{
  				font-family: var(--font-name);
  				font-weight: 500;
  				background: var(--bg-color);
  			}

  			h1,h2,h3,h4,h5,h6{
  				font-weight: 900;
  			}

  			.page{
  				background: var(--page-color);
  				height: 100%;

  			}

  			.page .page-body{
  				padding: 25px;
  			}

  			.ml-auto{
  				margin-left: auto;
  			}
  			.ml-15{
  				margin-left: 15px;
  			}

  			.mr-15{
  				margin-right: 15px;
  			}
  			.ml-25{
  				margin-left: 25px;
  			}

  			.ml-35{
  				margin-left: 35px;
  			}			
  			.small-x{
  				font-size: 12px;
  				font-weight: 500;
  			}

  			.small-w{
  				font-size: 12.5px;
  				font-weight: 500;
  			}
  			.small-y{
  				font-size: 14px;
  				font-weight: 500;	
  			}

  			.small-z{
  				font-size: 14px;
  				font-weight: 500;	
  			}

  			.td-size-459{
  				width: 459px;
  			}

  			.p-13{
  				font-size: 13px;
  			}

  			.p-14{
  				font-size: 14px;
  			}

  			.p-15{
  				font-size: 15px;
  			}

  			.p-16{
  				font-size: 16px;
  			}
  			.p-19{
  				font-size: 19px;
  			}
  			.p-18{
  				font-size: 18px;
  			}
  			.p-29{
  				font-size: 29px;
  			}
  			.p-bold{
  				font-weight: 800;
  			}

  			.price-bold{
  				font-weight: 800;
  			}

  			a{
  				text-decoration: none;
  				color: #000;
  			}

  			a:hover{
  				color: #000;
  			}
  			.underline{
  				position: relative;
  			}

  			.underline::before{
  				content: '';
  				position: absolute;
  				bottom: 0;
  				right: 0;
  				width: 0;
  				height: 2px;
  				background-color: #000;
  				transition: width 0.6s cubic-bezier(0.25, 1, 0.5, 1);
  			}

  			@media (hover: hover) and (pointer: fine) {
  				.underline:hover::before{
  					left: 0;
  					right: auto;
  					width: 100%;
  				}
  			}

  			.icon-card{
  				background:var(--bg-color);
  				color: #B2BABB;
  				border-radius: 17px;
  				width: 59px;
  				box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
  			}

  			.br-top{
  				border-top: 7px solid #fff;
  			}

  			.br-right{
  				border-right: 1px solid #ddd;
  			}

  			.br-right-ff{
  				border-right: 7px solid #fff;
  			}

  			.modal-shadow{
  				box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
  			}

  			.card-shadow{
  				box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
  			}

  			.table-sticky{
  				position: -webkit-sticky; /* Safari */
  				position: sticky;
  				top: 0;
  				background: var(--page-color);
  				z-index: 99;
  				box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
  			}

  			.apointer{
  				cursor: pointer;
  			}

  			.table thead>tr>th {
  				vertical-align: bottom;
  				border-bottom: 2px solid hsl(0, 0%, 99%);
  			}

  			.col-shadow{
  				box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
  			}

			/*table tbody tr td:hover{
				box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
				}*/
			</style>

			<title>Atlas Pazaryeri Buybox Takibi</title>
		</head>
		<body>
			<div class="container" style="max-width:1449px" id="app" v-cloak>
				<div class="page">
					<div class="page-body mb-2">
						<div class="d-flex mt-3 align-items-center">
							<div class="p-2 text-center"><img src="https://siyahklasor.com/assets/img/logo_dark.svg" width="41"></div>
							<div class="ml-auto">
								<input type="search" class="form-control" :placeholder="list.length +' / envanter içerisinde ara..'" v-model="search">
							</div>
						</div>
					</div>
					<table class="table table-bordered align-middle">
						<thead>
							<tr class="table-sticky">
								<th></th>
								<th scope="col">ID<br><span class="small-x text-muted">Stok Kodu</span></th>
								<th scope="col">
									<div class="d-flex align-items-center">
										<div>
											Ürün<br><span class="small-x text-muted">Detay Bilgiler</span>
										</div>
										<div class="ml-auto">
											<a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus-circle-fill p-18"></i></a>
										</div>
									</div>
								</th>
								<th scope="col">
									<div class="d-flex align-items-center">
										<div>
											Hepsiburada<br><span class="small-x text-muted">{{dateHepsiburada}}</span>
										</div>
										<div class="ml-auto">
											<a class="apointer" @click="runHepsiburada" v-if="show_hb"><i class="bi bi-play-fill p-19"></i></a>
											<span v-if="hide_hb" v-html="loading"></span>
										</div>
									</div>

								</th>
								<th scope="col">
									<div class="d-flex align-items-center">
										<div>
											Trendyol<br><span class="small-x text-muted">{{dateTrendyol}}</span>
										</div>
										<div class="ml-auto">
											<a class="apointer" @click="runTrendyol" v-if="show_ty"><i class="bi bi-play-fill p-19"></i></a>
											<span v-if="hide_ty" v-html="loading"></span>
										</div>
									</div>

								</th>
								<th scope="col">
									<div class="d-flex align-items-center">
										<div>
											Gittigidiyor<br><span class="small-x text-muted">{{dateGittigidiyor}}</span>
										</div>
										<div class="ml-auto">
											<a class="apointer" @click="runGittigidiyor" v-if="show_gg"><i class="bi bi-play-fill p-19"></i></a>
											<span v-if="hide_gg" v-html="loading"></span>
										</div>
									</div>

								</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(item, index) in filterList.slice(0,showProduct)">
								<td></td>
								<th scope="row">{{item.id}}</th>
								<td class="td-size-459">
									<div class="p-2">
										<div class="d-flex">
											<div>
												<img v-for="ty in listTrendyol" v-if="item.id == ty.productsID" :src="ty.productImg" width="55">
											</div>
											<div class="ml-15 p-15 p-bold">
												<span class="small-y text-muted">Analiz Ediliyor...</span><br>
												<a href="#" class="underline" data-bs-toggle="modal" data-bs-target="#analytcs" @click="selectProduct(item)">{{item.name}}</a>
											</div>								
										</div>
									</div>
								</td>
								<!-- BEGIN:: #1 HB -->
								<td>
									<div class="p-2" v-for="hb in listHepsiburada" v-if="item.id == hb.productsID">
										<div class="d-flex">
											<div>
												<span class="text-muted small-x">{{hb.seller}}</span><br>
												<span class="price-bold">{{parseInt(hb.HBPrice) | money}} TL</span>
												<br><span class="text-muted small-x">{{hb.productSKU}}</span>
											</div>
											<div class="ml-auto">
												<span class="text-muted small-x">Fiyat Önerisi</span><br>
												<span class="price-bold text-muted">
													{{ parseInt(item.priceHB) / ( ( parseInt(item.priceHB) / parseInt(hb.HBPrice) ) * 1.009 ) | money}} TL
												</span>
												<br>
												<span class="small-x text-danger" v-if="store_hb != hb.seller"><i class="bi bi-x-circle-fill"></i> Buybox</span>	
												<span class="small-x text-success p-bold" v-if="store_hb == hb.seller"><i class="bi bi-check-circle-fill"></i> Buybox</span>								 		
											</div>
										</div>

									</div>

								</td>
								<!-- END:: #1 HB -->

								<!-- BEGIN:: #2 TY -->
								<td>

									<div class="p-2" v-for="ty in listTrendyol" v-if="item.id == ty.productsID">
										<div class="d-flex">
											<div>
												<span class="text-muted small-x">{{ty.seller}}</span><br>
												<span class="price-bold">{{parseInt(ty.TYPrice) | money}} TL</span>
												<br><span class="text-muted small-x">{{ty.productSKU}}</span>
											</div>
											<div class="ml-auto">
												<span class="text-muted small-x">Fiyat Önerisi</span><br>
												<span class="price-bold text-muted">
													{{ parseInt(item.priceTY) / ( ( parseInt(item.priceTY) / parseInt(ty.TYPrice) ) * 1.009 ) | money}} TL
												</span>
												<br>
												<span class="small-x text-danger" v-if="store_ty != ty.seller"><i class="bi bi-x-circle-fill"></i> Buybox</span>	
												<span class="small-x text-success p-bold" v-if="store_ty == ty.seller"><i class="bi bi-check-circle-fill"></i> Buybox</span>							 		
											</div>
										</div>
									</div>

								</td>
								<!-- END:: #2 TY -->
								<!-- BEGIN:: #3 GG -->
								<td>
									<div class="p-2" v-for="gg in listGittigidiyor" v-if="item.id == gg.productsID">
										<div class="d-flex">
											<div>
												<span class="text-muted small-x">{{gg.seller}}</span><br>
												<span class="price-bold">{{parseInt(gg.GGPrice) | money}} TL</span>
												<br><span class="text-muted small-x">{{gg.productSKU}}</span>
											</div>
											<div class="ml-auto">
												<span class="text-muted small-x">Fiyat Önerisi</span><br>
												<span class="price-bold text-muted">
													{{ parseInt(item.priceGG) / ( ( parseInt(item.priceGG) / parseInt(gg.GGPrice) ) * 1.009 ) | money}} TL
												</span>
												<br>
												<span class="small-x text-danger" v-if="store_gg != gg.seller"><i class="bi bi-x-circle-fill"></i> Buybox</span>	
												<span class="small-x text-success p-bold" v-if="store_gg == gg.seller"><i class="bi bi-check-circle-fill"></i> Buybox</span>								 		
											</div>
										</div>

									</div>
								</td>
								<!-- END:: #3 GG -->
								<td></td>
							</tr>


						</tbody>
					</table>
				</div>

				<div class="text-center mt-5">
					<button class="btn btn-dark rounded shadow-sm w-25" title="Daha Fazlası" v-if="filterList.length > 21 && showProduct < filterList.length" @click="loadmore"><span class="ml-5 mr-5"><span v-if="show">Daha Fazlası</span><span v-if="hide" v-html="loading"></span></span></button>
				</div>

				<div class="d-flex align-items-center mt-5 mb-5">
					<div>
						<p class="small-z text-muted">© 2022 - Tüm Hakları Saklıdır, v1.0.0<br>Serkan Kuyu tarafından ❤️ ile kodlanmıştır</p>
					</div>
					<div class="ml-auto">
						<p class="small-z text-muted">Pazaryeri Mağaza Simülasyonu<br> <a href="https://siyahklasor.com/magaza" target="_blank">https://siyahklasor.com/magaza</a></p>
					</div>
				</div>


				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content" style="border:none;box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;">
							<div class="modal-header">
								<div class="p-2 text-center"><img src="https://siyahklasor.com/assets/img/logo_dark.svg" width="41"></div>

								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body" v-if="show">


								<div class="form-floating mb-3">
									<input type="text" :class="messagex == 1 ? 'border-danger' : ''" class="form-control" id="floatingInput" placeholder="Örn;123" v-model="products.id">
									<label for="floatingInput" class="p-bold">ID</label>
									<div id="emailHelp" :class="messagex == 1 ? 'text-danger p-bold' : ''" class="form-text">Ürünün stok kodu, ürün eşleşmesi için zorunludur</div>
								</div>

								<div class="form-floating mb-3">
									<input type="text" :class="messagex == 1 ? 'border-danger' : ''" class="form-control" placeholder="Örn;Philips " v-model="products.name">
									<label for="floatingInput" class="p-bold">Ürün adı</label>
									<div id="emailHelp" :class="messagex == 1 ? 'text-danger p-bold' : ''" class="form-text">Pazaryerine ait olabilir veya olmayabilir, zorunludur</div>
								</div>

								<div class="form-floating mb-3">
									<input type="number" class="form-control" placeholder="Örn;1000 " v-model="products.cost">
									<label for="floatingInput" class="p-bold">Maliyet</label>
									<div id="emailHelp" class="form-text">Ürünün net maliyet tutarı, isteğe bağlıdır</div>
								</div>
							</div>

							<div class="bg-light"  v-if="show">
								<div class="modal-body mt-2">
									<div class="d-flex align-items-center">
										<div><p class="small-y">HEPSİBURADA</p></div>
										<div class="ml-auto">
											<a data-bs-toggle="collapse" href="#hepsiburada"><i class="bi bi-arrow-down-circle-fill"></i></a>
										</div>
									</div>
									<div class="collapse" id="hepsiburada">
										<div class="form-floating mb-3">
											<input type="text" class="form-control" placeholder="Örn;https://hepsiburada.com/philips..." v-model="products.urlHB">
											<label for="floatingInput" class="p-bold">Hepsiburada URL</label>
											<div id="emailHelp" class="form-text">Buybox okuması için gerekli alandır</div>
										</div>
										<div class="form-floating mb-3">
											<input type="number" :class="messagex == 1 ? 'border-danger' : ''" class="form-control" placeholder="Örn;1000 " v-model="products.priceHB">
											<label for="floatingInput" class="p-bold">Satış Fiyatı</label>
											<div id="emailHelp" :class="messagex == 1 ? 'text-danger p-bold' : ''" class="form-text">Buybox kıyaslaması için, isteğe bağlıdır</div>
										</div>
										<div class="row g-3">
											<div class="col-6">
												<div class="form-floating mb-3">
													<input type="number" class="form-control" placeholder="Örn;12.98" v-model="products.commissionHB">
													<label for="floatingInput" class="p-bold">Hepsiburada Oran</label>
													<div id="emailHelp" class="form-text">Komisyon oranı, isteğe bağlı</div>
												</div>
											</div>
											<div class="col-6">
												<div class="form-floating mb-3">
													<input type="number" class="form-control" placeholder="Örn;12.98" v-model="products.cargoHB">
													<label for="floatingInput" class="p-bold">Hepsiburada Kargo</label>
													<div id="emailHelp" class="form-text">Kargo Bedeli, isteğe bağlı</div>
												</div>
											</div>
										</div>
									</div>


								</div>
							</div>
							<div class="bg-light br-top"  v-if="show">
								<div class="modal-body">
									<div class="d-flex align-items-center">
										<div><p class="small-y">TRENDYOL</p></div>
										<div class="ml-auto">
											<a data-bs-toggle="collapse" href="#trendyol"><i class="bi bi-arrow-down-circle-fill"></i></a>
										</div>
									</div>

									<div class="collapse" id="trendyol">
										<div class="form-floating mb-3">
											<input type="text" class="form-control" placeholder="Örn;12.98" v-model="products.urlTY">
											<label for="floatingInput" class="p-bold">Trendyol URL</label>
											<div id="emailHelp" class="form-text">Buybox okuması için gerekli alandır</div>
										</div>
										<div class="form-floating mb-3">
											<input type="number" :class="messagex == 1 ? 'border-danger' : ''" class="form-control" placeholder="Örn;1000 " v-model="products.priceTY">
											<label for="floatingInput" class="p-bold">Satış Fiyatı</label>
											<div id="emailHelp" :class="messagex == 1 ? 'text-danger p-bold' : ''" class="form-text">Buybox kıyaslaması için, isteğe bağlıdır</div>
										</div>
										<div class="row g-3">
											<div class="col-6">
												<div class="form-floating mb-3">
													<input type="number" class="form-control" placeholder="Örn;12.98" v-model="products.commissionTY">
													<label for="floatingInput" class="p-bold">Trendyol Oran</label>
													<div id="emailHelp" class="form-text">Komisyon oranı, isteğe bağlı</div>
												</div>
											</div>
											<div class="col-6">
												<div class="form-floating mb-3">
													<input type="number" class="form-control" placeholder="Örn;12.98" v-model="products.cargoTY">
													<label for="floatingInput" class="p-bold">Trendyol Kargo</label>
													<div id="emailHelp" class="form-text">Kargo Bedeli, isteğe bağlı</div>
												</div>
											</div>
										</div>
									</div>


								</div>
							</div>
							<div class="bg-light br-top" v-if="show">
								<div class="modal-body">
									<div class="d-flex align-items-center">
										<div><p class="small-y">GİTTİGİDİYOR</p></div>
										<div class="ml-auto">
											<a data-bs-toggle="collapse" href="#gittigidiyor"><i class="bi bi-arrow-down-circle-fill"></i></a>
										</div>
									</div>
									<div class="collapse" id="gittigidiyor">
										<div class="form-floating mb-3">
											<input type="text" class="form-control" placeholder="Örn;12.98" v-model="products.urlGG">
											<label for="floatingInput" class="p-bold">Gittigidiyor URL</label>
											<div id="emailHelp" class="form-text">Buybox okuması için gerekli alandır</div>
										</div>
										<div class="form-floating mb-3">
											<input type="number" :class="messagex == 1 ? 'border-danger' : ''" class="form-control" placeholder="Örn;1000 " v-model="products.priceGG">
											<label for="floatingInput" class="p-bold">Satış Fiyatı</label>
											<div id="emailHelp" :class="messagex == 1 ? 'text-danger p-bold' : ''" class="form-text">Buybox kıyaslaması için, isteğe bağlıdır</div>
										</div>
										<div class="row g-3">
											<div class="col-6">
												<div class="form-floating mb-3">
													<input type="number" class="form-control" placeholder="Örn;12.98" v-model="products.commissionGG">
													<label for="floatingInput" class="p-bold">Gittigidiyor Oran</label>
													<div id="emailHelp" class="form-text">Komisyon oranı, isteğe bağlı</div>
												</div>
											</div>
											<div class="col-6">
												<div class="form-floating mb-3">
													<input type="number" class="form-control" placeholder="Örn;12.98" v-model="products.cargoGG">
													<label for="floatingInput" class="p-bold">Gittigidiyor Kargo</label>
													<div id="emailHelp" class="form-text">Kargo Bedeli, isteğe bağlı</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div v-if="hide" v-html="loadingInfo"></div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary w-100" @click="add">
									<span v-if="hide" v-html="loading"></span>
									<span v-if="show">Kaydet</span>
								</button>
							</div>
						</div>
					</div>
				</div>



				<!-- Modal -->
				<div class="modal fade" id="analytcs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog  modal-dialog-centered"  style="max-width:1199px;">
						<div class="modal-content modal-shadow">
							<div class="row">
								<div class="col-10">
									<div class="row">
										<div class="col-4 bg-light br-right-ff" style="border-radius: 5px 0px 0px 5px;">
											<div class="p-2" v-for="hb in listHepsiburada" v-if="select.id == hb.productsID">
												<div class="d-flex align-items-center">
													<div>
														<p class="mt-3 p-bold">Hepsiburada<br><span class="small-x text-muted">{{dateHepsiburada}}</span></p>
														
													</div>
													<div class="ml-auto">
														<a :href="hb.productUrl" class="text-muted" target="_blank"><i class="bi bi-arrow-up-right-circle p-16"></i></a>
													</div>
												</div>

												<div>

													<div class="row mt-4">
														<div class="col-6">
															<div class="card">
																<div class="card-body">
																	<span class="small-x">HB Buybox</span>
																	<p class="p-bold">{{parseInt(hb.HBPrice) | money}}</p>
																</div>
															</div>

															<div class="mt-3 mb-1 small-w text-secondary"><i class="bi bi-receipt-cutoff"></i> Komisyon: {{ (parseInt(hb.HBPrice) / 100 ) * select.commissionHB | money}}</div>
															<div class="mb-1 small-w text-secondary"><i class="bi bi-briefcase"></i> Hakediş: {{ parseInt(hb.HBPrice) - ( (parseInt(hb.HBPrice) / 100 ) * select.commissionHB ) - select.cargoHB| money}}</div>
														</div>
														<div class="col-6">
															<div class="card">
																<div class="card-body">
																	<span class="small-x">{{store_hb}} <a data-bs-toggle="collapse" href="#accountHB" class="text-secondary small-x"><i class="bi bi-plus"></i></a></span>
																	<div class="collapse" id="accountHB">
																		<input type="number" class="form-control form-control-sm" v-model="select.priceHB">
																	</div>
																	<p class="p-bold">{{select.priceHB | money}}</p>
																</div>
															</div>

															

															<div class="mb-1 mt-3 small-w text-secondary"><i class="bi bi-percent"></i> Komisyon : {{select.commissionHB}}</div>
															<div class="mb-1 small-w text-secondary"><i class="bi bi-box"></i> Kargo: {{select.cargoHB | money}}</div>
															<div class="mb-1 small-w text-secondary"><i class="bi bi-receipt-cutoff"></i> Komisyon: {{ (select.priceHB / 100 ) * select.commissionHB | money}}</div>
															<div class="mb-1 small-w text-secondary"><i class="bi bi-briefcase"></i> Hakediş: {{ select.priceHB - ( (select.priceHB / 100 ) * select.commissionHB ) - select.cargoHB| money}}</div>
															<div class="mb-5 small-w text-secondary"><i class="bi bi-cash-stack"></i> Kazanç: {{ (select.priceHB - ( (select.priceHB / 100 ) * select.commissionHB ) - select.cargoHB) - select.cost  | money}}</div>
														</div>
													</div>
													

													<div class="d-flex align-items-center mb-4">
														<div></div>
														<div class="ml-auto text-end">
															<span class="badge rounded-pill bg-danger" v-if="parseInt(hb.HBPrice) < select.priceHB"><i class="bi bi-x"></i> Değil % {{ ( select.priceHB / parseInt(hb.HBPrice)).toFixed(2) }} </span>

															<span class="badge rounded-pill bg-success" v-if="parseInt(hb.HBPrice) > select.priceHB"><i class="bi bi-check"></i> Uygun % {{ (parseInt(hb.HBPrice) / select.priceHB).toFixed(2) }}</span>

															<span class="badge rounded-pill bg-warning" v-if="parseInt(hb.HBPrice) == select.priceHB"><i class="bi bi-info"></i> Eşit % {{ (parseInt(hb.HBPrice) / select.priceHB).toFixed(2) }}</span>

															<p class="mt-2 text-secondary small-x">
																<i class="bi bi-info-circle"></i> Maliyet : {{ ( parseInt(hb.HBPrice) - ((parseInt(hb.HBPrice) / 100 ) * select.commissionHB) - (select.cargoHB)) / 1.12 | money }} TL
															</p>
														</div>

													</div>


												</div>
											</div>
										</div>
										<div class="col-4 bg-light br-right-ff">
											<div class="p-2" v-for="ty in listTrendyol" v-if="select.id == ty.productsID">
												<div class="d-flex align-items-center">
													<div>
														<p class="mt-3 p-bold">Trendyol<br><span class="small-x text-muted">{{dateTrendyol}}</span></p>
													</div>
													<div class="ml-auto">
														<a :href="ty.productUrl" class="text-muted" target="_blank"><i class="bi bi-arrow-up-right-circle p-16"></i></a>
													</div>
												</div>

												<div>

													<div class="row mt-4">
														<div class="col-6">
															<div class="card">
																<div class="card-body">
																	<span class="small-x">TY Buybox</span>
																	<p class="p-bold">{{parseInt(ty.TYPrice) | money}}</p>
																</div>
															</div>

															<div class="mt-3 mb-1 small-w text-secondary"><i class="bi bi-receipt-cutoff"></i> Komisyon: {{ (parseInt(ty.TYPrice) / 100 ) * select.commissionTY | money}}</div>
															<div class="mb-1 small-w text-secondary"><i class="bi bi-briefcase"></i> Hakediş: {{ parseInt(ty.TYPrice) - ( (parseInt(ty.TYPrice) / 100 ) * select.commissionTY ) - select.cargoTY| money}}</div>
														</div>
														<div class="col-6">
															<div class="card">
																<div class="card-body">
																	<span class="small-x">{{store_ty}} <a data-bs-toggle="collapse" href="#accountTY" class="text-secondary small-x"><i class="bi bi-plus"></i></a></span>
																	<div class="collapse" id="accountTY">
																		<input type="number" class="form-control form-control-sm" v-model="select.priceTY">
																	</div>
																	<p class="p-bold">{{select.priceTY | money}}</p>
																</div>
															</div>

															

															<div class="mb-1 mt-3 small-w text-secondary"><i class="bi bi-percent"></i> Komisyon : {{select.commissionTY}}</div>
															<div class="mb-1 small-w text-secondary"><i class="bi bi-box"></i> Kargo: {{select.cargoTY | money}}</div>
															<div class="mb-1 small-w text-secondary"><i class="bi bi-receipt-cutoff"></i> Komisyon: {{ (select.priceTY / 100 ) * select.commissionTY | money}}</div>
															<div class="mb-1 small-w text-secondary"><i class="bi bi-briefcase"></i> Hakediş: {{ select.priceTY - ( (select.priceTY / 100 ) * select.commissionTY ) - select.cargoTY | money}}</div>
															<div class="mb-5 small-w text-secondary"><i class="bi bi-cash-stack"></i> Kazanç: {{ (select.priceTY - ( (select.priceTY / 100 ) * select.commissionTY ) - select.cargoTY) - select.cost  | money}}</div>
														</div>
													</div>
													

													<div class="d-flex align-items-center mb-4">
														<div></div>
														<div class="ml-auto text-end">
															<span class="badge rounded-pill bg-danger" v-if="parseInt(ty.TYPrice) < select.priceTY"><i class="bi bi-x"></i> Değil % {{ ( select.priceTY / parseInt(ty.TYPrice)).toFixed(2) }} </span>

															<span class="badge rounded-pill bg-success" v-if="parseInt(ty.TYPrice) > select.priceTY"><i class="bi bi-check"></i> Uygun % {{ (parseInt(ty.TYPrice) / select.priceTY).toFixed(2) }}</span>

															<span class="badge rounded-pill bg-warning" v-if="parseInt(ty.TYPrice) == select.priceTY"><i class="bi bi-info"></i> Eşit % {{ (parseInt(ty.TYPrice) / select.priceTY).toFixed(2) }}</span>

															<p class="mt-2 text-secondary small-x">
																<i class="bi bi-info-circle"></i> Maliyet : {{ ( parseInt(ty.TYPrice) - ((parseInt(ty.TYPrice) / 100 ) * select.commissionTY) - (select.cargoTY)) / 1.12 | money }} TL
															</p>
														</div>

													</div>


												</div>
											</div>
										</div>
										<div class="col-4 bg-light">
											<div class="p-2" v-for="gg in listGittigidiyor" v-if="select.id == gg.productsID">
												<div class="d-flex align-items-center">
													<div>
														<p class="mt-3 p-bold">Gittigidiyor<br><span class="small-x text-muted">{{dateGittigidiyor}}</span></p>
													</div>
													<div class="ml-auto">
														<a :href="gg.productUrl" class="text-muted" target="_blank"><i class="bi bi-arrow-up-right-circle p-16"></i></a>
													</div>
												</div>

												<div>

													<div class="row mt-4">
														<div class="col-6">
															<div class="card">
																<div class="card-body">
																	<span class="small-x">GG Buybox</span>
																	<p class="p-bold">{{parseInt(gg.GGPrice) | money}}</p>
																</div>
															</div>

															<div class="mt-3 mb-1 small-w text-secondary"><i class="bi bi-receipt-cutoff"></i> Komisyon: {{ (parseInt(gg.GGPrice) / 100 ) * select.commissionGG | money}}</div>
															<div class="mb-1 small-w text-secondary"><i class="bi bi-briefcase"></i> Hakediş: {{ parseInt(gg.GGPrice) - ( (parseInt(gg.GGPrice) / 100 ) * select.commissionGG ) - select.cargoGG| money}}</div>
														</div>
														<div class="col-6">
															<div class="card">
																<div class="card-body">
																	<span class="small-x">{{store_gg}} <a data-bs-toggle="collapse" href="#accountGG" class="text-secondary small-x"><i class="bi bi-plus"></i></a></span>
																	<div class="collapse" id="accountGG">
																		<input type="number" class="form-control form-control-sm" v-model="select.priceGG">
																	</div>
																	<p class="p-bold">{{select.priceGG | money}}</p>
																</div>
															</div>

															

															<div class="mb-1 mt-3 small-w text-secondary"><i class="bi bi-percent"></i> Komisyon : {{select.commissionGG}}</div>
															<div class="mb-1 small-w text-secondary"><i class="bi bi-box"></i> Kargo: {{select.cargoGG | money}}</div>
															<div class="mb-1 small-w text-secondary"><i class="bi bi-receipt-cutoff"></i> Komisyon: {{ (select.priceGG / 100 ) * select.commissionGG | money}}</div>
															<div class="mb-1 small-w text-secondary"><i class="bi bi-briefcase"></i> Hakediş: {{ select.priceGG - ( (select.priceGG / 100 ) * select.commissionGG ) - select.cargoGG| money}}</div>
															<div class="mb-5 small-w text-secondary"><i class="bi bi-cash-stack"></i> Kazanç: {{ (select.priceGG - ( (select.priceGG / 100 ) * select.commissionGG ) - select.cargoGG) - select.cost  | money}}</div>
														</div>
													</div>
													

													<div class="d-flex align-items-center mb-4">
														<div></div>
														<div class="ml-auto text-end">
															<span class="badge rounded-pill bg-danger" v-if="parseInt(gg.GGPrice) < select.priceGG"><i class="bi bi-x"></i> Değil % {{ ( select.priceGG / parseInt(gg.GGPrice)).toFixed(2) }} </span>

															<span class="badge rounded-pill bg-success" v-if="parseInt(gg.GGPrice) > select.priceGG"><i class="bi bi-check"></i> Uygun % {{ (parseInt(gg.GGPrice) / select.priceGG).toFixed(2) }}</span>

															<span class="badge rounded-pill bg-warning" v-if="parseInt(gg.GGPrice) == select.priceGG"><i class="bi bi-info"></i> Eşit % {{ (parseInt(gg.GGPrice) / select.priceGG).toFixed(2) }}</span>

															<p class="mt-2 text-secondary small-x">
																<i class="bi bi-info-circle"></i> Maliyet : {{ ( parseInt(gg.GGPrice) - ((parseInt(gg.GGPrice) / 100 ) * select.commissionGG) - (select.cargoGG)) / 1.12 | money }} TL
															</p>
														</div>

													</div>


												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-2 col-shadow">
									<div class="p-2">
										<img v-for="ty in listTrendyol" v-if="select.id == ty.productsID" :src="ty.productImg" width="55" class="mt-5">
										<p class="p-15 mt-4"><span class="small-x text-muted">Analiz Ediliyor...</span><br>{{select.name}}</p>
										<span class="mt-2 small-x">Stok Kodu : {{select.id}}</span>
									</div>

								</div>
							</div>

						</div>
					</div>
				</div>


			</div>



			<!-- Optional JavaScript; choose one of the two! -->

			<!-- Option 1: Bootstrap Bundle with Popper -->
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


			<script src="assets/js/app.js?v1.0.0"></script>

		</body>
		</html>
