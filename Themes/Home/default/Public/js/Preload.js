/**
 * =Preload
 * 
 */
Preload = function() {
	
	// Vars definitions
	var self = this;
	self.loadedElements = 0;
	self.loadedElementsPct = 0;
	
	// Methods definitions
	
	/**
	 * Page content initialization
	 * 
	 * @name	init
	 * @version	1.0
	 * @since	2013-05-30
	 * @author	Rémy Vuong <remy@vuong.fr>
	 * @param	string wrapperId, ID of the HTML main element
	 * @param	object elementsArray
	 * @return	void
	 */
	this.init = function( wrapperId, elementsArray, callback ){
		self.wrapperId = wrapperId;
		self.callback = callback;
		
		// Hides the main content
		document.getElementById( self.wrapperId ).style.display = 'none';
		
		// Adds the loader element after having the content hidden
		self.addLoader();
		
		// Proceed to loading
		self.elements = elementsArray;
		self.incLoadedElement( 0 );
	}
	
	/**
	 * Create the loading bar elements and replaces the page content with it
	 * 
	 * @name	addLoader
	 * @version	1.0
	 * @since	2013-05-30
	 * @author	Rémy Vuong <remy@vuong.fr>
	 * @param	void
	 * @return	void
	 */
	this.addLoader = function() {
		document.body.className = 'loading';
		
		var loader_container = document.createElement('div');
		loader_container.id = 'loader_container';
		
		/*var loader_block = document.createElement('div');
		loader_block.id = 'loader_block';

		 <div class="loader-inner ball-spin-fade-loader">
		 <div></div>
		 <div></div>
		 <div></div>
		 <div></div>
		 <div></div>
		 <div></div>
		 <div></div>
		 <div></div>
		 </div>

		*/
		var loader_block1='<div class="loader-inner ball-spin-fade-loader">' +
			'<div></div>' +
			'<div></div>' +
			'<div></div>' +
			'<div></div>' +
			'<div></div>' +
			'<div></div>' +
			'<div></div>' +
			'<div></div>' +
			'<div></div>' +
			'<div></div>' +
			'<div></div>' +
			'<div></div>' +
			'<div></div>' +
			'<div></div>' +
			'</div>';


			
		var loader_block = document.createElement('div');
		loader_block.id = 'loader_block';
		loader_container.appendChild( loader_block );
		
		var loader_bar = document.createElement('div');
		loader_bar.id = 'loader_bar';
		loader_block.appendChild( loader_bar );
		
		
		var loader_text = document.createElement('span');
		loader_text.id = 'loader_text';
		loader_text.appendChild( document.createTextNode('0%') );
		loader_block.appendChild( loader_text );
	
		$(loader_text).css({'color':'#fff','fontSize':'1.4em','position':'absolute','left':'50%','top':'50%','transform':'translate(-50%,-50%)'});
		document.body.appendChild( loader_container );
		$('#loader_bar').append(loader_block1);
	}
	
	/**
	 * Increments the loaded elements count
	 * 
	 * @name	incLoadedElement
	 * @version	1.0
	 * @since	2013-05-31
	 * @author	Rémy Vuong <remy@vuong.fr>
	 * @param	
	 * @return	
	 */
	this.incLoadedElement = function( i ) {
		if ( typeof( self.elements[i] ) === 'undefined' ) {
			return false;
		}
		
		// TODO dynamically get the delay length from the CSS transition property
		var delay = 100;
		
		var img = new Image();
		img.i = i;
		img.delay = delay;
		img.src = self.elements[i];
		img.onload = function( e ) {
			self.loadedElements++;
			self.loadedElementsPct = parseInt( self.loadedElements * 100 / self.elements.length );
			document.getElementById('loader_bar').style.width = self.loadedElementsPct + '%';
			document.getElementById('loader_text').innerHTML = self.loadedElementsPct + '%';
			
			var i = this.i;
			setTimeout(function() {
				if ( 100 === self.loadedElementsPct ) {
					self.removeLoader();
					self.callback();
					return false;
				}
				
				self.incLoadedElement(i+1);
			}, this.delay);
		};
		
		delete delay; delay = null;
		delete img; img = null;
	}
	
	this.removeLoader = function() {
		// Hides the main content
		document.getElementById( 'loader_container' ).style.display = 'none';
		document.body.className = '';
		document.getElementById( self.wrapperId ).style.display = 'block';
	}
}
