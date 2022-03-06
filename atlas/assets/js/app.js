function formatNumber(n, c, d, t){
	var c = isNaN(c = Math.abs(c)) ? 2 : c, 
	d = d === undefined ? '.' : d, 
	t = t === undefined ? ',' : t, 
	s = n < 0 ? '-' : '', 
	i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
	j = (j = i.length) > 3 ? j % 3 : 0;
	return s + (j ? i.substr(0, j) + t : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, '$1' + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : '');
};


let app = new Vue({
	el : '#app',
	data(){
		return {
			store_hb : 'Mağaza Adı',
			store_ty : 'Mağaza Adı',
			store_gg : 'Mağaza Adı',
			messagex         : '',
			search           : '',
			showProduct      : 12,
			dateHepsiburada  : '',
			dateTrendyol     : '',
			dateGittigidiyor : '',
			products : {
				id           : '', 
				name         : '', 
				cost         : '',
				urlHB        : '',
				commisionHB  : '',
				cargoHB      : '',
				priceHB      : '',
				urlTY        : '',
				commisionTY  : '',
				cargoTY      : '',
				priceTY      : '',	
				urlGG        : '',
				commisionGG  : '',
				cargoGG      : '',
				priceGG      : '',			
			},
			users : {username : '', password: ''},
			list: [],
			listTrendyol: [],
			listHepsiburada: [],
			listGittigidiyor: [],
			select : [],
			loading : '<span class="spinner-border" style="width: 1.3rem; height: 1.3rem;" role="status" v-if="hide"></span>',
			loadingInfo : '<div class="mt-5 mb-5 text-center"><i class="bi bi-info-circle p-29"></i> <p>Lütfen bekleyin, veriler işleniyor..<br><span class="small-x">Birkaç saniye içerisinde veriler işlenmiş olacaktır</span></p></div>',
			show : true,
			hide: false,
			show_ty : true,
			hide_ty: false,
			show_gg : true,
			hide_gg: false,	
			show_hb : true,
			hide_hb: false,					
		}
	},

	filters:{

		money: function(value){
			return formatNumber(value, 2, ',', '.');
		},
	},

	mounted : function(){

		this.getList();
		this.getTrendyol();
		this.getHepsiburada();
		this.getGittigidiyor();
	},

	computed : {
		filterList: function(){
			return this.list.filter(item => {

				return (
					this.search.length === 0 || item.name.toLowerCase().includes(this.search.toLowerCase()) 
					) 
			});

		},
	},


	methods: {

        /**
         * 
         * 
         * 
         * @description | Yeni ürün bilgilerini json dosyasına gönderiyoruz
         * @serkankuyu [serkan.kuyu@hotmail.com.tr]
         * @siyahklasor.com/magaza [Pazaryeri Mağaza Simülasyonu]
         * 
         *
         *
         */

         add: function(){

         	if(confirm('Verilerin işlenmesini istyior musunuz?')){

         		this.show = false;
         		this.hide = true;

         		let formData = this.toFormData(this.products);

         		axios.post("api.php?action=add", formData)
         		.then(function(response){

         			setTimeout(function(){

         				app.show = true;
         				app.hide = false;

         				if(response.data.message == "success"){
         					//console.log(response);
         					
         					app.products = {				
         						id           : '', 
         						name         : '', 
         						cost         : '',
         						urlHB        : '',
         						commisionHB  : '',
         						cargoHB      : '',
         						priceHB      : '',
         						urlTY        : '',
         						commisionTY  : '',
         						cargoTY      : '',
         						priceTY      : '',	
         						urlGG        : '',
         						commisionGG  : '',
         						cargoGG      : '',
         						priceGG      : '',
         					};

         					app.getList();

         					

         				}else{
         					//console.log(response);
         					app.messagex = response.data.error
         				}


         			}, 2000);



         		});

         	}

         },

        /**
         * 
         * 
         * 
         * @description | Analiz için ürün seçiyoruz
         * @serkankuyu [serkan.kuyu@hotmail.com.tr]
         * @siyahklasor.com/magaza [Pazaryeri Mağaza Simülasyonu]
         * 
         *
         *
         */

         selectProduct:function(item){
         	this.select = item;
           //console.log(this.select);
         },


        /**
         * 
         * 
         * 
         * @description | Ürünleri listeliyoruz
         * @serkankuyu [serkan.kuyu@hotmail.com.tr]
         * @siyahklasor.com/magaza [Pazaryeri Mağaza Simülasyonu]
         * 
         *
         *
         */

         getList: function(){

         	axios.get("products.json")
         	.then(function(response){

         		app.list = response.data;
         		//console.log(response);
         	});
         },


        /**
         * 
         * 
         * 
         * @description | Trendyol verilerini listeliyoruz
         * @serkankuyu [serkan.kuyu@hotmail.com.tr]
         * @siyahklasor.com/magaza [Pazaryeri Mağaza Simülasyonu]
         * 
         *
         *
         */
         getTrendyol: function(){

         	axios.get("marketplace/trendyol.json")
         	.then(function(response){

         		app.listTrendyol = response.data;
         		app.dateTrendyol = response.data[0].dataDate;
         		//console.log(response);
         	});
         },


         runTrendyol: function(){

         	if(confirm('Trendyol verileri çalıştırmak ister misin?')){
         		this.show_ty = false;
         		this.hide_ty = true;


         		axios.post("marketplace_trendyol.php")
         		.then(function(response){

         			if(response.data.message == 'success'){

         				app.show_ty = true;
         				app.hide_ty = false;

         				app.getTrendyol();

         			}

         		});

         	}

         },


        /**
         * 
         * 
         * 
         * @description | Hepsiburada verilerini listeliyoruz
         * @serkankuyu [serkan.kuyu@hotmail.com.tr]
         * @siyahklasor.com/magaza [Pazaryeri Mağaza Simülasyonu]
         * 
         *
         *
         */
         getHepsiburada: function(){

         	axios.get("marketplace/hepsiburada.json")
         	.then(function(response){

         		app.listHepsiburada = response.data;
         		app.dateHepsiburada = response.data[0].dataDate;
         		//console.log(response);
         	});
         },

         runHepsiburada: function(){

         	if(confirm('Hepsiburada verileri çalıştırmak ister misin?')){


         		this.show_hb = false;
         		this.hide_hb = true;



         		axios.post("marketplace_hepsiburada.php")
         		.then(function(response){

         			if(response.data.message == 'success'){

         				app.show_hb = true;
         				app.hide_hb = false;

         				app.getHepsiburada();

         			}

         		});

         		
         		
         	}

         },

        /**
         * 
         * 
         * 
         * @description | Gittigidiyor verilerini listeliyoruz
         * @serkankuyu [serkan.kuyu@hotmail.com.tr]
         * @siyahklasor.com/magaza [Pazaryeri Mağaza Simülasyonu]
         * 
         *
         *
         */
         getGittigidiyor: function(){

         	axios.get("marketplace/gittigidiyor.json")
         	.then(function(response){

         		app.listGittigidiyor = response.data;
         		app.dateGittigidiyor = response.data[0].dataDate;
         		//console.log(response);
         	});
         },

         runGittigidiyor: function(){

         	if(confirm('Gittigidiyor verileri çalıştırmak ister misin?')){

         		this.show_gg = false;
         		this.hide_gg = true;

         		axios.post("marketplace_gittigidiyor.php")
         		.then(function(response){


         			if(response.data.message == 'success'){

         				app.show_gg = true;
         				app.hide_gg = false;

         				app.getGittigidiyor();

         			}

         		});



         	}

         },


         loadmore: function(){

         	this.show = false;
         	this.hide = true;

         	setTimeout(()=>{

         		this.show = true;
         		this.hide = false;

         		this.showProduct *= 2;
         	},250)

         },


         toFormData: function(obj){

         	let form_data = new FormData();
         	for(var key in obj){
         		form_data.append(key, obj[key]);
         	}

         	return form_data;
         }

       }

     });
