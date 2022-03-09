window.onload = (function()
{
    const canvas = document.querySelector("canvas");
    const abbild = document.getElementById("abbild");
    const btnclear = document.querySelector(".clear");
    var signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgba(250,250,250)'
    });
    signaturePad.onEnd =function(){
        abbild.value = canvas.toDataURL();
    };
    btnclear.addEventListener("click",clear, false);
    function clear()
    {
        signaturePad.clear();
        abbild.value="";
    }
    window.onresize = resizeCanvas();
    resizeCanvas();
    function resizeCanvas()
   {
       var ratio = Math.max(window.devicePixelRatio || 1,1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
    }
})

    



