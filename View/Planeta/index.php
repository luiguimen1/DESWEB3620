<div class="col-lg-3" id="menu" style="float: left;">

    <div class="card border-secondary mb-3" style="max-width: 20rem;">
        <div class="card-header">Menú</div>
        <div class="card-body text-secondary item3">
            <ul>
                <li>Mercurio</li>
                <li>Venus</li>
                <li>Tierra</li>
                <li>Marte</li>
                <li>Jupiter</li>
                <li>Neptuno</li>
                <li>Saturno</li>
                <li>Urano</li>
            </ul>    
        </div>
    </div>






    <h3></h3>

</div>
<div class="col-lg-9" style="float: left;">
    <img src="IMG/SisSolar.jpg" width="100%" alt=""/>
</div>

<script>
    $(document).ready(function () {
        function martes() {
            inicio(2);
        }

        function inicio(pValor) {
            $(".item3 li").click(function () {
                alert("Hola");
            });
        }
        martes();
    });

</script>