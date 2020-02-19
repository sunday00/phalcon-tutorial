// @ts-check

let alpha = "1";

// @ts-ignore
if( alpha === 1 ){
    console.log("true!");
}

/**
 * // @param {string|null} somearg
 * @param {string=} somearg
 */

function beta (somearg = null) {
    console.log(somearg);
}

beta();