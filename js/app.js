let menuToggler = document.querySelector('#menu-toggler')
let menu = document.querySelector('#menu')
let menuStatus = false
let global = document.querySelector('#global')
menuToggler.addEventListener('click', () => {
    if(!menuStatus) {
        menu.style.transform = "translateX(0)"
        menuStatus = true
    }
})

global.addEventListener('click', (e) => {
    if(menuStatus) {
        menu.style.transform = "translateX(-100%)"
        menuStatus = false
    }
}, true)


// $(document).ready(function(){
//     var $vote = $('#vote');
//     $('.vote-like', $vote).click(function(e){
//         e.preventDefault();
//         $.post('like.php', {
//             ref: $vote.data('ref'),
//             ref_id: $vote.data('ref_id'),
//             user_id: $vote.data('user_id')
//         }).done(function(data, textStatus, jqXHR){
//             console.log(data);
//         }).fail(function(jqXHR, textStatus, errorThrown){
//             console.log(jqXHR);

//         })
//     })



// })
