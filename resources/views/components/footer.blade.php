<footer class="footerNav">
    <nav>
        <ul>
            <li><span class="material-icons u-noselect">bedtime</span></li>
            <li>
                {{-- Add active class if current path is '/' --}}
                <span class="{{ Request::is('/') ? 'u-active' : '' }} material-icons u-noselect">
                    home
                </span>
            </li>
            <li><span class="material-icons u-noselect">settings</span></li>
        </ul>
    </nav>
</footer>