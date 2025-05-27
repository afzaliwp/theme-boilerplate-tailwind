export const getQueryVariable = ( variable ) => {
    const query = window.location.search.substring( 1 );
    const vars = query.split( "&" );

    for ( let i = 0; i < vars.length; i++ ) {
        let pair = vars[ i ].split( "=" );

        if ( pair[ 0 ] === variable ) {
            return pair[ 1 ];
        }
    }

    return false;
}

export const debounce = ( func, wait ) => {
    let timeout;
    return function executedFunction( ...args ) {
        const later = () => {
            clearTimeout( timeout );
            func( ...args );
        };
        clearTimeout( timeout );
        timeout = setTimeout( later, wait );
    };
}

export const numberFormat = ( number, decimals, dec_point, thousands_point ) => {
    if ( number == null || !isFinite( number ) ) {
        throw new TypeError( "number is not valid" );
    }

    if ( !decimals ) {
        let len = number.toString().split( '.' ).length;
        decimals = len > 1 ? len : 0;
    }

    if ( !dec_point ) {
        dec_point = '.';
    }

    if ( !thousands_point ) {
        thousands_point = ',';
    }

    number = parseFloat( number ).toFixed( decimals );

    number = number.replace( ".", dec_point );

    let splitNum = number.split( dec_point );
    splitNum[ 0 ] = splitNum[ 0 ].replace( /\B(?=(\d{3})+(?!\d))/g, thousands_point );
    number = splitNum.join( dec_point );

    return number;
}

export const persianToEnglishNumbers = ( input ) => {
    const persianNumerals = [ '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹' ];
    const latinNumerals = [ '0', '1', '2', '3', '4', '5', '6', '7', '8', '9' ];
    let sanitizedInput = input;

    for ( let i = 0; i < persianNumerals.length; i++ ) {
        const persianNumeral = persianNumerals[ i ];
        const latinNumeral = latinNumerals[ i ];
        sanitizedInput = sanitizedInput.split( persianNumeral ).join( latinNumeral );
    }

    return sanitizedInput;
}