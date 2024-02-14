const scrollManager = {
    scrollThreshold: 768,
    scrollingIcon: document.getElementById( 'scrollingIcon' ),

    scrollToTop: () => window.scrollTo( { top: 0, behavior: "smooth" } ),
    updateVisibility: () => {
        const isVisible = window.scrollY > scrollManager.scrollThreshold
        scrollManager.scrollingIcon.style.display = isVisible ? 'flex' : 'none'
    },
    setupEventListeners: () => {
        scrollManager.scrollingIcon.addEventListener( 'click', scrollManager.scrollToTop )
        window.addEventListener( 'scroll', scrollManager.updateVisibility )
        scrollManager.updateVisibility()
    },

    init: () => document.addEventListener( 'DOMContentLoaded', scrollManager.setupEventListeners ),
}
scrollManager.init();





function updateButtonAppearance ( condition, button ) {
    button.disabled = !condition
}

function toggleButtonState ( checkboxId, buttonId ) {
    const checkbox = document.getElementById( checkboxId )
    const button = document.getElementById( buttonId )
    if ( checkbox && button ) {
        checkbox.addEventListener( 'change', () =>{
            updateButtonAppearance( checkbox.checked, button )
        } )
    }
}
// Call the function with specific check box IDs and button IDs
toggleButtonState( 'modal-terms', 'modal-button-checked' )
toggleButtonState( 'terms-select-checkbox', 'terms-select-plan' )






function isTextInputEmpty ( inputId, buttonId ) {
    const textInput = document.getElementById( inputId )
    const button = document.getElementById( buttonId )

    if ( textInput && button ) {
        const updateButtonState = () => updateButtonAppearance( textInput.value.trim() !== '', button )

        textInput.addEventListener( 'change', updateButtonState )
        textInput.addEventListener( 'input', updateButtonState )

        // Initial setup
        updateButtonState()
    }
}

// Call the function with specific text input and button IDs
isTextInputEmpty( 'promo', 'promo-button' )







// document.addEventListener( 'DOMContentLoaded', function () {
//     const nav = document.getElementById( 'nav' )
//     function updateNavTransform () {
//         const scrollY = window.scrollY
//         const translateYValue = -scrollY + 'px'

//             const transformValue = `translateY(${ translateYValue })`
//             nav.style.transform = transformValue

//     }
//     window.addEventListener( 'scroll', updateNavTransform )
// } );


//login-signup

function togglePassword ( passwords, eyes ) {
    const password = document.getElementById( passwords )
    const eye = document.getElementById( eyes )
    const toggleEyeClass = ( currentClass, newClass ) => {
        if ( eye.classList.contains( currentClass ) ) {
            eye.classList.replace( currentClass, newClass )
        }
    }
    toggleEyeClass( "fa-eye", "fa-eye-slash" )
    toggleEyeClass( "fa-eye-slash", "fa-eye" )

    const type =password.getAttribute( "type" ) === "password" ? "text" : "password"
    password.setAttribute( "type", type )
}




const passwordToggler = {
     password : document.getElementById( passwordsId ),
     eye :document.getElementById( eyesId ),
    toggleEyeClass: (currentClass, newClass ) => {
        if ( passwordToggler.eye.classList.contains( currentClass ) ) {
            passwordToggler.eye.classList.replace( currentClass, newClass )
        }
    },
    togglePassword: () => {
        toggleEyeClass( eye, "fa-eye", "fa-eye-slash" )
        toggleEyeClass( eye, "fa-eye-slash", "fa-eye" )
        passwordToggler.password.getAttribute( "type" ) === "password" ? "text" : "password"
        password.setAttribute( "type", type )
    },
}

passwordToggler.togglePassword( "yourPasswordInputId", "yourEyeIconId" );










function cutText ( paragraph, maxLength ) {
    if ( paragraph.length <= maxLength ) {
        return paragraph
    } else {
        const cutText = paragraph.substring( 0, maxLength )
        return cutText + "..."
    }
}
const inputElements = document.querySelectorAll( ".inputText" )
const maxLength = 100 // Set your desired maximum length

inputElements.forEach( ( inputElement, index ) => {
    const inputText = inputElement.textContent
    const cutOutput = cutText( inputText, maxLength )

    const outputDiv = document.querySelectorAll( ".output" )[ index ]
    outputDiv.textContent = cutOutput
} )
