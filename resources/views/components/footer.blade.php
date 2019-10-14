
<footer class="page-footer blue-grey darken-2">
    <div class="container">
        <div class="row">
            <div class="col l5 s12">
                @component('components.default_widget',['title'=>'Quem Somos','content'=>getValue('quem_somos')])
                @endcomponent
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Newslleters</h5>
                @component('components.newsletter_frm')
                @endcomponent
            </div>
            <div class="col l4 s12">
                <h5 class="white-text">Instagram</h5>
                <div id="instafeed"></div>
            </div>
        </div>
    </div>
    <div class="footer-copyright blue-grey darken-4">
        <div class="container ">
            Desenvolvido por <a class="brown-text text-lighten-3" href="{{ url('login') }}">Antonio José</a>
        </div>
    </div>
</footer>
