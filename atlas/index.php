
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

  			.modal-shadow{
  				box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
  			}

  			.card-shadow{
  				box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
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
						<tr>
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
										<a href="#" @click="runHepsiburada" v-if="show_hb"><i class="bi bi-play-fill p-19"></i></a>
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
										<a href="#" @click="runTrendyol" v-if="show_ty"><i class="bi bi-play-fill p-19"></i></a>
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
										<a href="#" @click="runGittigidiyor" v-if="show_gg"><i class="bi bi-play-fill p-19"></i></a>
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
								<div class="collapse show" id="hepsiburada">
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
												<input type="text" class="form-control" placeholder="Örn;12.98" v-model="products.commissionHB">
												<label for="floatingInput" class="p-bold">Hepsiburada Oran</label>
												<div id="emailHelp" class="form-text">Komisyon oranı, isteğe bağlı</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-floating mb-3">
												<input type="text" class="form-control" placeholder="Örn;12.98" v-model="products.cargoHB">
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
												<input type="text" class="form-control" placeholder="Örn;12.98" v-model="products.commissionTY">
												<label for="floatingInput" class="p-bold">Trendyol Oran</label>
												<div id="emailHelp" class="form-text">Komisyon oranı, isteğe bağlı</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-floating mb-3">
												<input type="text" class="form-control" placeholder="Örn;12.98" v-model="products.cargoTY">
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
												<input type="text" class="form-control" placeholder="Örn;12.98" v-model="products.commissionGG">
												<label for="floatingInput" class="p-bold">Gittigidiyor Oran</label>
												<div id="emailHelp" class="form-text">Komisyon oranı, isteğe bağlı</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-floating mb-3">
												<input type="text" class="form-control" placeholder="Örn;12.98" v-model="products.cargoGG">
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
				<div class="modal-dialog  modal-dialog-centered"  style="max-width:999px;">
					<div class="modal-content modal-shadow">
						<div class="modal-header">

							<div class="p-2">
								<div class="d-flex align-items-center">
									<div>
										<img v-for="ty in listTrendyol" v-if="select.id == ty.productsID" :src="ty.productImg" width="55">
									</div>
									<div class="ml-15 p-15 p-bold">
										<div class="d-flex align-items-center">
											<div><span class="small-y text-muted">Analiz Ediliyor...</span></div>
											<div class=" ml-auto"></div>
										</div>
										{{select.name}}
									</div>								
								</div>
							</div>
							
							
						</div>

						<div class="row">
							<div class="col-4 br-right">
								<div class="p-3" v-for="hb in listHepsiburada" v-if="select.id == hb.productsID">
									<h6 class="mt-3">Hepsiburada</h6>
									<div>
										<div class="card mt-3">
											<div class="card-body p-bold">
												<div class="d-flex align-items-center">
													<div class="br-right">
														<div class="mr-15">	
															<span class="small-y"><a data-bs-toggle="collapse" href="#accountHB" class="text-secondary"><i class="bi bi-caret-down"></i></a> Satış Fiyatı</span><br>
															{{select.priceHB | money}} TL

														</div>
													</div>
													<div class="ml-15">
														<span class="small-y">HB Fiyatı</span><br>
														{{ parseInt(hb.HBPrice) | money}} TL
													</div>
												</div>
											</div>
										</div>
										

										<div class="alert alert-warning small-y mt-3" role="alert">
											<i class="bi bi-info-circle"></i> Buybox için Maliyet<br>
											<strong>{{ ( parseInt(hb.HBPrice) - ((parseInt(hb.HBPrice) / 100 ) * select.commissionHB) - (select.cargoHB)) / 1.12 | money }} TL</strong>
										</div>

										<div class="collapse mt-3" id="accountHB">
											<span class="small-y">Buybox fiyat hesapla</span>
											<input type="number" class="form-control form-control-sm" v-model="select.priceHB">
										</div>

										<div class="mb-1 mt-4 small-y"><i class="bi bi-percent"></i> Komisyon : {{select.commissionHB}}</div>
										<div class="mb-1 small-y"><i class="bi bi-box"></i> Kargo: {{select.cargoHB | money}} TL</div>
										<div class="mb-1 small-y"><i class="bi bi-receipt-cutoff"></i> Komisyon: {{ ( select.priceHB / 100 ) * select.commissionHB | money}} TL</div>
										<div class="mb-1 small-y"><i class="bi bi-briefcase"></i> Hakediş: {{ select.priceHB - ( (select.priceHB / 100 ) * select.commissionHB ) - select.cargoHB | money}} TL</div>
										<div class="mb-4 small-y"><i class="bi bi-cash-stack"></i> Kazanç: {{ (select.priceHB - ( (select.priceHB / 100 ) * select.commissionHB ) - select.cargoHB) - select.cost  | money}} TL</div>

										<a :href="hb.productUrl" class="btn btn-sm btn-primary w-100 mb-3" target="_blank">Ürüne Git</a>
									</div>
								</div>
							</div>
							<div class="col-4 br-right">
								<div class="p-3" v-for="ty in listTrendyol" v-if="select.id == ty.productsID">
									<h6 class="mt-3">Trendyol</h6>
									<div>
										<div class="card mt-3">
											<div class="card-body p-bold">
												<div class="d-flex align-items-center">
													<div class="br-right">
														<div class="mr-15">	
															<span class="small-y"><a data-bs-toggle="collapse" href="#accountTY" class="text-secondary"><i class="bi bi-caret-down"></i></a> Satış Fiyatı</span><br>
															{{select.priceTY | money}} TL
														</div>
													</div>
													<div class="ml-15">
														<span class="small-y">TY Fiyatı</span><br>
														{{parseInt(ty.TYPrice) | money}} TL
													</div>
												</div>
											</div>
										</div>

										

										<div class="alert alert-warning small-y mt-3" role="alert">
											<i class="bi bi-info-circle"></i> Buybox için Maliyet<br>
											<strong>{{ ( parseInt(ty.TYPrice) - ((parseInt(ty.TYPrice) / 100 ) * select.commissionTY) - (select.cargoTY)) / 1.12 | money }} TL</strong>
										</div>

										<div class="collapse mt-3" id="accountTY">
											<span class="small-y">Buybox fiyat hesapla</span>
											<input type="number" class="form-control form-control-sm" v-model="select.priceTY">
										</div>

										<div class="mb-1 mt-4 small-y"><i class="bi bi-percent"></i> Komisyon : {{select.commissionTY}}</div>
										<div class="mb-1 small-y"><i class="bi bi-box"></i> Kargo: {{select.cargoTY | money}} TL</div>
										<div class="mb-1 small-y"><i class="bi bi-receipt-cutoff"></i> Komisyon: {{ (select.priceTY / 100 ) * select.commissionTY | money}} TL</div>
										<div class="mb-1 small-y"><i class="bi bi-briefcase"></i> Hakediş: {{ select.priceTY - ( (select.priceTY / 100 ) * select.commissionTY ) - select.cargoTY | money}} TL</div>
										<div class="mb-4 small-y"><i class="bi bi-cash-stack"></i> Kazanç: {{ (select.priceHB - ( (select.priceTY / 100 ) * select.commissionTY ) - select.cargoTY) - select.cost  | money}} TL</div>

										<a :href="ty.productUrl" class="btn btn-sm btn-primary w-100 mb-3" target="_blank">Ürüne Git</a>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="p-3" v-for="gg in listGittigidiyor" v-if="select.id == gg.productsID">
									<h6 class="mt-3">Gittigidiyor</h6>
									<div>
										<div class="card mt-3">
											<div class="card-body p-bold">
												<div class="d-flex align-items-center">
													<div class="br-right">
														<div class="mr-15">	
															<span class="small-y"><a data-bs-toggle="collapse" href="#accountGG" class="text-secondary"><i class="bi bi-caret-down"></i></a> Satış Fiyatı</span><br>
															{{select.priceGG | money}} TL
														</div>
													</div>
													<div class="ml-15">
														<span class="small-y">GG Fiyatı</span><br>
														{{parseInt(gg.GGPrice) | money}} TL
													</div>
												</div>
												
											</div>
										</div>

									
										<div class="alert alert-warning small-y mt-3" role="alert">
											<i class="bi bi-info-circle"></i> Buybox için Maliyet<br>
											<strong>{{ ( parseInt(gg.GGPrice) - ((parseInt(gg.GGPrice) / 100 ) * select.commissionGG) - (select.cargoGG)) / 1.12 | money }} TL</strong>
										</div>

										<div class="collapse mt-3" id="accountGG">
											<span class="small-y">Buybox fiyat hesapla</span>
											<input type="number" class="form-control form-control-sm" v-model="select.priceGG">
										</div>

										<div class="mb-1 mt-4 small-y"><i class="bi bi-percent"></i> Komisyon : {{select.commissionGG}}</div>
										<div class="mb-1 small-y"><i class="bi bi-box"></i> Kargo: {{select.cargoGG | money}} TL</div>
										<div class="mb-1 small-y"><i class="bi bi-receipt-cutoff"></i> Komisyon: {{ (select.priceGG / 100 ) * select.commissionGG | money}} TL</div>
										<div class="mb-1 small-y"><i class="bi bi-briefcase"></i> Hakediş: {{ select.priceGG - ( (select.priceGG / 100 ) * select.commissionGG ) - select.cargoGG | money}} TL</div>
										<div class="mb-4 small-y"><i class="bi bi-cash-stack"></i> Kazanç: {{ (select.priceGG - ( (select.priceHB / 100 ) * select.commissionGG ) - select.cargoGG) - select.cost  | money}} TL</div>

										<a :href="gg.productUrl" class="btn btn-sm btn-primary w-100 mb-3" target="_blank">Ürüne Git</a>
									</div>
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
