<div class="flex-grow flex flex-col items-center justify-center">
    <i class="mdi mdi-close" style="font-size: 15em;"></i>
    <span class="text-xl">Vous ne disposez pas des droits pour accéder à cette section</span>
    <span class="text-lg text-gray-500">Vous allez être redirigé automatiquement dans <span id="timer"></span> secondes</span>
</div>

<script>
    const timer = $('#timer')
    let redirectTimer = 5;

    timer.text(redirectTimer)
    setInterval((i) => {
        redirectTimer--
        timer.text(redirectTimer)
    }, 1000)


    setTimeout(() => {
        console.log(redirectTimer)
        changeRoute('/')
    }, redirectTimer * 1000)
</script>