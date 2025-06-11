class General {
	selectors = {
		primaryButton: '.button-primary',
		tabsWrapper: '.tabs-wrapper',
		tabButtons: '.tab-buttons',
		tabButton: '.tab-button',
		tabContent: '.tab-content',
		copyButton: '.copy-url-button'
	}

	elements = {}

	constructor() {
		document.addEventListener( 'DOMContentLoaded', () => {
			this.refreshElements();
			this.handleTabs();
			this.handleCopyButton();
		} );
	}

	refreshElements() {
		this.elements.primaryButton = document.querySelectorAll( this.selectors.primaryButton );
		this.elements.tabsWrapper = document.querySelectorAll( this.selectors.tabsWrapper );
		this.elements.copyButton = document.querySelector( this.selectors.copyButton );
	}

	handlePrimaryButtons() {
		if ( !this.elements.primaryButton ) {
			return;
		}

		this.elements.primaryButton.forEach( button => {
			if ( !button.querySelector( '.arrow-box' ) ) {
				const arrowBox = document.createElement( 'span' );
				arrowBox.className = 'arrow-box';

				const arrowIcon = document.createElement( 'i' );
				arrowIcon.className = 'mx-icon mx-arrow-right text-h5-reg text-natural-white-500';

				arrowBox.appendChild( arrowIcon );
				button.appendChild( arrowBox );
			}
		} );
	}

	handleTabs() {
		if ( !this.elements.tabsWrapper ) {
			return;
		}

		this.elements.tabsWrapper.forEach( wrapper => {
			const tabButtons = wrapper.querySelector( this.selectors.tabButtons );
			const buttons = wrapper.querySelectorAll( this.selectors.tabButton );
			const contents = wrapper.querySelectorAll( this.selectors.tabContent );

			if ( !tabButtons || !buttons.length || !contents.length ) {
				return;
			}

			this.updateTabSlider( tabButtons, buttons );

			buttons.forEach( ( button, index ) => {
				button.addEventListener( 'click', () => {
					this.switchTab( tabButtons, buttons, contents, index, button.dataset.tab );
				} );
			} );
		} );
	}

	switchTab( tabButtons, buttons, contents, index, tabName ) {
		const buttonWidth = 100 / buttons.length;
		tabButtons.style.setProperty( '--slider-width', `${buttonWidth}%` );
		tabButtons.style.setProperty( '--slider-transform', `translateX(${index * 100}%)` );

		buttons.forEach( btn => {
			btn.classList.remove( 'active', 'text-gray-800' );
			btn.classList.add( 'text-gray-500' );
		} );
		buttons[ index ].classList.add( 'active', 'text-gray-800' );
		buttons[ index ].classList.remove( 'text-gray-500' );

		contents.forEach( content => {
			content.classList.remove( 'active' );
			if ( content.dataset.content === tabName ) {
				content.classList.add( 'active' );
			}
		} );
	}

	updateTabSlider( tabButtons, buttons ) {
		const activeButton = Array.from( buttons ).find( btn => btn.classList.contains( 'active' ) );
		const activeIndex = Array.from( buttons ).indexOf( activeButton );
		const buttonWidth = 100 / buttons.length;

		tabButtons.style.setProperty( '--slider-width', `${buttonWidth}%` );
		tabButtons.style.setProperty( '--slider-transform', `translateX(${activeIndex * 100}%)` );
	}

	// Handle Copy URL Button
	handleCopyButton() {
		if ( !this.elements.copyButton ) {
			return;
		}

		this.elements.copyButton.addEventListener( 'click', () => {
			const url = window.location.href;
			navigator.clipboard.writeText( url ).then( () => {
				this.showToast( "Page URL copied!" );
			} ).catch( err => {
				console.error( "Failed to copy URL:", err );
			} );
		} );
	}

	// Toast Notification
	showToast( message ) {
		const toast = document.createElement( 'div' );
		toast.textContent = message;
		toast.className = "fixed bottom-4 left-1/2 -translate-x-1/2 bg-black-400 text-center body1 font-medium text-white-100 px-4 py-2 rounded transition-opacity duration-300 opacity-0";

		document.body.appendChild( toast );

		setTimeout( () => {
			toast.classList.add( "opacity-100" );
		}, 100 );

		setTimeout( () => {
			toast.classList.remove( "opacity-100" );
			setTimeout( () => {
				toast.remove();
			}, 300 );
		}, 3000 );
	}
}

export default new General();
