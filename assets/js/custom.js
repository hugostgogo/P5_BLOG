$('#createButton').on('click', (e) => {
    e.stopPropagation()
    $('#modal').fadeIn('fast')

    document.addEventListener('click', (e) => {
        if (e.target == $('#modalBackgroundCreate')[0]) $('#modal').fadeOut('fast')
    })

    document.addEventListener('keydown', (e) => {
        if (e.keyCode == 27) $('#modal').fadeOut('fast')
    })
})

async function sendComment(id, author_id) {
    const comment = new FormData()
    comment.append('author_id', author_id)
    comment.append('post_id', id)
    comment.append('content', $('#commentText').val())
    $('#commentText').val('')

    const response = await fetch(`/comments`, {
        method: 'POST',
        body: comment
    })

    window.location.href = ''
}

// MENU CARD
var menuState = false
$('.activatorButton').on('click', (e1, args) => {
    e1.stopPropagation()

    var el = $(`#menu${e1.currentTarget.id}`)
    menuState = !menuState
    if (menuState) {
        el.fadeIn('fast').css('display', 'flex')
        console.log(el)
    }

    document.addEventListener('click', (e) => {
        e.stopPropagation()
        el.fadeOut('fast')
        menuState = false
    })
})

// OPEN UPDATE MODAL
var modalState = false
$('.updateButton').on('click', (e, args) => {
    e.stopPropagation()

    var el = $(`#form${e.currentTarget.id}`)

    modalState = !modalState
    if (modalState) el.fadeIn('fast').css('display', 'flex')

    $(`.close-modal`).on('click', (e) => {
        e.stopPropagation()
        let clickOutside = [...e.target.classList].includes('close-modal')
        if (clickOutside) {
            el.fadeOut('fast')
            modalState = false
        }
    })
})

$('#submitBtn').on('click', (e) => {
    console.log($('#createUser'))
    $('#createUser').submit()
});

var menuState = false
$('#profilePictureButton').on('click', (e) => {
    e.stopPropagation()
    menuState = !menuState
    var el = $('#profileMenu')
    if (menuState) el.fadeIn('fast').css('display', 'flex')
    else el.fadeOut('fast')

    document.addEventListener('click', (e) => {
        el.fadeOut('fast')
        menuState = false
    }, {
        once: true
    })

})

function changeRoute(route, $event) {
    window.location.href = route
}

console.log('SALUT')