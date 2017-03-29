(function (win,doc,$) {
	function Shop(options){
		this._init(options);
	}
	$.extend(Shop.prototype,{
		_init: function (options) {
			var self=this;
			self.options={
				num       : 1,
				add       : '.add',
				reduce    : '.reduce',
				quantity  : '.quantity',
				totaId    : '#totaId',
				Price     : '#Price'
			};
			$.extend(true,self.options,options || {});
			this._initDomEvent();
		},
		_initDomEvent: function () {
			var opts=this.options;
			this.$num=opts.num;
			this.$add=$(opts.add);                 //加上
			this.$reduce=$(opts.reduce);           //减去
			this.$quantity=$(opts.quantity);       //购买节点
			this.$totaId=$(opts.totaId);           //库存节点
			this.$quanNum=$(opts.quantity).val();  //购买个数
			this.$total=parseInt($(opts.totaId).text());     //库存个数
			this.$contont=this.$total;              //不变的个数
			this.$terms=opts.terms;                 //价格
			this.$Price=$(opts.Price);              //价格节点
			console.log(this.$num);
			this._addclick()._Subtract()._changeBlur();
		},
		_addclick: function () {  //添加
			var self=this,anum,bnum;
			self.$add.on('click', function () {
				//console.log(self.$quantity.val()+'----'+self.$contont);

				if(self.$quantity.val() <= self.$contont){
					self.$num+=1;
					self.$quantity.val(self.$num);
					self._total(true);
				}
			});
			return self;
		},
		_Subtract: function () { //减去
			var self=this;
			self.$reduce.on('click', function () {
				if(self.$quantity.val()>1){
					self.$num-=1;
					self.$quantity.val(self.$num);
					self._total(false);
					self.$Price.text(self.$terms*self.$quantity.val());
					console.log(self.$quantity.val());
				}
			});
			return self;
		},
		_total: function (judge) {  //库存

			var self=this,judge=judge ? true : false;
			if(judge){

				if(this.$total>=0){
					self.$totaId.text(--self.$total);
					self.$Price.text(self.$terms*self.$quantity.val());
				}

			}else {
				self.$totaId.text(++self.$total);
				self.$Price.text(self.$terms*self.$quantity.val());
			}

		},
		_changeBlur: function () {
			var self=this,anum;
			self.$quantity.on('blur', function () {
				anum=self.$quantity.val();
				if(anum>self.$contont){
					self.$quantity.val(self.$contont);
					self.$totaId.text(0);
					self.$Price.text(self.$terms*self.$quantity.val());
				}else if(anum<=0){
					self.$quantity.val(1);

					self.$Price.text(self.$terms*self.$quantity.val());
				}

			});
			return self;
		}
	});
	win.Shop=Shop;
})(window,document,jQuery);
var Shop = window.Shop;

new Shop ({
	num       : 1,
	add       : '.add',
	reduce    : '.reduce',
	quantity  : '.quantity',
	totaId    : '#totaId',
	Price     : '#Price',
	terms     : 9800
});