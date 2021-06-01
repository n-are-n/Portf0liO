var date = new Date(); // Create date object
document.getElementById( 'year' ).innerHTML = date.getFullYear(); // Get year of object

let mainNavLinks = document.querySelectorAll( "nav div ul li a" );
window.addEventListener( "scroll", event =>
{
    let fromTop = window.scrollY;

    mainNavLinks.forEach( link =>
    {
        let section = document.querySelector( link.hash );

        if (
            section.offsetTop <= fromTop &&
            section.offsetTop + section.offsetHeight > fromTop
        )
        {
            link.classList.add( "active" );
        } else
        {
            link.classList.remove( "active" );
        }
    } );
} );


/*===== MENU SHOW =====*/
const showMenu = ( toggleId, navId ) =>
{
    const toggle = document.getElementById( toggleId ),
        nav = document.getElementById( navId )

    if ( toggle && nav )
    {
        toggle.addEventListener( 'click', () =>
        {
            nav.classList.toggle( 'show' )
        } )
    }
}
showMenu( 'nav-toggle', 'nav-menu' )

/*===== ACTIVE AND REMOVE MENU =====*/
const navLink = document.querySelectorAll( '.nav__link' );

function linkAction ()
{
    /*Active link*/
    navLink.forEach( n => n.classList.remove( 'active' ) );
    this.classList.add( 'active' );

    /*Remove menu mobile*/
    const navMenu = document.getElementById( 'nav-menu' )
    navMenu.classList.remove( 'show' )
}
navLink.forEach( n => n.addEventListener( 'click', linkAction ) );
