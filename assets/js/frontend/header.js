import Swiper from "swiper";

class Header {

	selectors = {
		wrapper: '.header-wrapper',
		header: '.site-header',
	}

	elements = {}

	constructor() {
		document.addEventListener( 'DOMContentLoaded', () => {
			this.refreshElements();
			this.handleStickyHeader();
		} );
	}

	refreshElements() {
		this.elements.wrapper = document.querySelector( this.selectors.wrapper );
		this.elements.header = this.elements.wrapper.querySelector( this.selectors.header );
	}

	handleStickyHeader() {
		window.addEventListener( 'scroll', () => {
			if ( window.scrollY > 100 ) {
				this.elements.wrapper.classList.add( 'scrolled' );
			} else {
				this.elements.wrapper.classList.remove( 'scrolled' );
			}
		} );
	}
}

export default new Header();