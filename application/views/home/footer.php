

        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer class="page-footer text-center font-small mdb-color darken-2 mt-4 wow fadeIn">

        <!--Call to action-->
        <div class="pt-4 pb-4">
            <a  href="#"  role="button">
                <img src="<?php echo base_url()?>img/playstore.png" class="img-fluid" style="width:11em">
            </a>
        </div>
        <!--/.Call to action-->


        <!--Copyright-->
        <div class="footer-copyright py-3">
            © 2018 Copyright: <a href="https://mdbootstrap.com/education/bootstrap/" > Cari Kata </a>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->


<style type="text/css">.material-spinner{background: #ffffff4f;position: fixed; top: 0; left: 0; z-index: 9999; width: 100%; height: 100%;} .spinner { position: fixed; right: 50%; bottom: 50%; transform: translate(-50%,-50%);-webkit-animation: rotator 1.4s linear infinite; animation: rotator 1.4s linear infinite; } @-webkit-keyframes rotator { 0% { -webkit-transform: rotate(0deg); transform: rotate(0deg); } 100% { -webkit-transform: rotate(270deg); transform: rotate(270deg); } } @keyframes rotator { 0% { -webkit-transform: rotate(0deg); transform: rotate(0deg); } 100% { -webkit-transform: rotate(270deg); transform: rotate(270deg); } } .path { stroke-dasharray: 187; stroke-dashoffset: 0; -webkit-transform-origin: center; transform-origin: center; -webkit-animation: dash 1.4s ease-in-out infinite, colors 5.6s ease-in-out infinite; animation: dash 1.4s ease-in-out infinite, colors 5.6s ease-in-out infinite; } @-webkit-keyframes colors { 0% { stroke: #4285F4; } 25% { stroke: #DE3E35; } 50% { stroke: #F7C223; } 75% { stroke: #1B9A59; } 100% { stroke: #4285F4; } } @keyframes colors { 0% { stroke: #4285F4; } 25% { stroke: #DE3E35; } 50% { stroke: #F7C223; } 75% { stroke: #1B9A59; } 100% { stroke: #4285F4; } } @-webkit-keyframes dash { 0% { stroke-dashoffset: 187; } 50% { stroke-dashoffset: 46.75; -webkit-transform: rotate(135deg); transform: rotate(135deg); } 100% { stroke-dashoffset: 187; -webkit-transform: rotate(450deg); transform: rotate(450deg); } } @keyframes dash { 0% { stroke-dashoffset: 187; } 50% { stroke-dashoffset: 46.75; -webkit-transform: rotate(135deg); transform: rotate(135deg); } 100% { stroke-dashoffset: 187; -webkit-transform: rotate(450deg); transform: rotate(450deg); } }
</style>
<div class="material-spinner" id="spinner" style="display: none">
    <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
       <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
    </svg>
</div>
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url() ?>js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <!-- Cari Kata core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url() ?>js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>

    <script type="text/javascript">
    $('.result').hide();
    $("#findWord").on("submit", function(event){
        event.preventDefault();

        $('[name="word"]').css({"border":"", "background":""});
        if ($('[name="word"]').val().length==0){
            $('[name="word"]').css({"border": "2px solid #f57474", "background": "#fcd0d0"}).focus();
            return;
        }

        $('.result').empty().hide();
        $('#spinner').show();

        $.post($(this).attr("action"),$(this).serialize()).done(function(d){
            var data=[];
            try{
                data = JSON.parse(d);
            }
            catch(e){
                console.log (e);
            }

            if (data.length==0){
                $('.result').append("<div>Tidak ada hasil untuk kata '"+$('[name="word"]').val()+"'!</div>");
                // return;
            }
            $.each(data, function(i, row){
                var definition = row.definition;
                $('.result').append("<div><h3>Definisi dari kata "+$('[name="word"]').val()+"</h3></div>");
                $('.result').append("<div>"+definition+"</div>");
            });
            $('.result').show();
            $('#spinner').hide();
        })
    })

    $(function(){
        var cUrl = (window.location.href).replace(/^\/+|\/+$/g, '');
        console.log ("cUrl : "+cUrl);
        $('.top-menu li>a').each(function(){
            var tUrl = $(this).attr("href").replace(/^\/+|\/+$/g, '');
            if (tUrl==cUrl){
                $(this).closest("li").addClass("active");
            }else{
                $(this).closest("li").removeClass("active");

            }
        })
    })
</script>
</body>

</html>