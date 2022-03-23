<footer class="footerNav">
    <nav>
        <ul>
            <li><span class="material-icons u-noselect">bedtime</span></li>
            <a href="{{'/'}}">
                <li>
                    {{-- Add active class if current path is '/' --}}
                    <span class="{{ Request::is('/') ? 'u-active' : '' }} material-icons u-noselect">
                        home
                    </span>
                </li>
            </a>
            <li><span class="material-icons u-noselect">settings</span></li>
        </ul>
    </nav>
</footer>