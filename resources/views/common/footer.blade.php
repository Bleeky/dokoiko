<div class="footer">
    <!--
    <div class="socials">
        <a target="_blank" class="social-tooltip footer-hover" title="Twitter" href="#"><i
                    class="fa fa-twitter fa-2x"></i></a>
        <a target="_blank" class="social-tooltip footer-hover" title="Google+" href="#"><i
                    class="fa fa-google-plus fa-2x"></i></a>
        <a target="_blank" class="social-tooltip footer-hover" title="Facebook" href="#"><i
                    class="fa fa-facebook fa-2x"></i></a>
    </div>
    -->
    @if (!Auth::check())
        <hr style="color: white;" width="200px;">
        <div class="copyright">
            © Copyright 2014 Dokoiko. All Rights Reserved.<br>
            Illustrations by <a target="_blank" class="footer-hover" href="http://ganitzsh.deviantart.com">Ganitzsh</a>.
            Yeah.
        </div>
    @endif
</div>
