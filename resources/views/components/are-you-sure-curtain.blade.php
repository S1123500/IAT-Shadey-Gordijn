<article class="areYouSure__background" id="js--areYouSureCurtainOverlay">
    
    <section class="areYouSure__wrapper">
        <p class="addNewTimer__p" id="js--areYouSureCloseCurtainIcon">
            <span class="addNewTimer__closeIcon material-icons u-noselect">
                close   
            </span>
            <span class="addNewTimer__closeHoverText"> Cancel </span>
        </p>
        <h2 class="areYouSure__title"> ARE YOU SURE? </h2>
        <p class="areYouSure__text"> 
            You’re about to delete this curtain permanently. 
            You won’t be able to get it back. Continue?
        </p>
        <section class="areYouSure__buttons">
            <button onclick="window.location.href = '/delete/{{$curtain->name}}'" class="areYouSure__deleteBtn" id="js--areYouSure__deleteCurtainBtn">
                <span class="material-icons u-noselect">
                    delete
                </span>
                Delete
            </button>
            <button class="areYouSure__cancelBtn" id="js--areYouSureCancelCurtainBtn"> Cancel </button>
        </section>
    </section>
</article>