<html>
    <head>
        <style>
            body {
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }

            .all {
                border: 20px #eee solid;
            }

            body p {
                font-size: 0.9em;
            }

            .mail-body {
                width: 100%;
                background: #fff7ec;
            }

            .mail-body h2 {
                margin: 0;
                padding: 10px 10px 0 10px;
                color: #ffedd3;
                background: #0c182c;
            }

            .slogan {
                margin: 0;
                clear: both;
                padding: 0 10px 10px 10px;
                color: #919191;
                font-size: 0.9em;
                font-weight: 400;
                background: #0c182c;
            }

            .mail-text, .flyerDiv {
                padding: 0 20px;
            }

            .flyerDiv img {
                width: 100%;
            }

            .unsubscribe {
                font-size: 0.9em;
                color: #7c7c7c;
                padding-bottom: 10px;
                /* border-bottom: 1px solid #c4c4c4; */
            }

            .unsubscribe p {
                text-align: center;
            }

            .unsubscribe p a {
                padding: 5px 10px;
                color: #7c7c7c;
                background: #fff3e2;
                border-radius: 3px;
                text-decoration: none;
            }

            .unsubscribe p a:hover {
                color: #0c182c;
                background: #fad9ab;
            }

            .pivo_logo {
                width: 200px;
                margin: 0 auto;
            }

            .pivo_logo img {
                width: 50px;
                margin: 0 75px;
            }

            .pivo_logo a {
                text-decoration: none;
            }

            .pivo_logo p {
                margin: 0 0 5px 0;
                color: #c4c4c4;
                font-weight: 300;
            }

        </style>
    </head>

    <body>
        <div class="all">
            <div class="mail-body">
                <h2>Soho Friday</h2>
                <h6 class="slogan">Event Reminder..!</h6>
                <p>&nbsp;</p>
                <div class="mail-text">
                    <p>Hello {{session('mailTo')}}Fam,</p>
                    {{-- <p>Hi Sir/Madam,</p> --}}
                    <p>{!! session('mailMsg') !!}
                        {{-- <p>Come have a good time with the Simply Irresistible train Today after the long week stress.</p><p><br></p><p>📆 3rd May 2024</p><p>📍SoHo (Marina Mall)</p><p>⏰7pm- 4am</p><p><br></p><p>Table Reservations: 0550188888/</p><p>0271000085</p> --}}
                    </p>
                    {{-- <p>23413 5265</p>
                    <p>adf adsfsdgfdga fg afgf</p> --}}
                    {{-- <p>{{session('mailMsg')}}</p> --}}
                    {{-- <p>This is just a short reminder or our upcoming event. Kindly find event details below.</p> --}}
                    <p>Best Regards</p>
                    {{-- <p>Regards, <br>Promoplux Team</p> --}}
                </div>
                <p>&nbsp;</p>
                @if (session('broadcastFlyer') != 'Null' || session('broadcastFlyer') != '' || empty(session('broadcastFlyer')))
                    <div class="flyerDiv">
                        <img src={{ session('broadcastFlyer') }} alt="">
                    </div>
                    <p>&nbsp;</p>
                @endif
            </div>
            <div class="unsubscribe">
                {{-- /{{session('mailTo')->id}} --}}
                <p>Click <a href="https://mensahdb.pivoapps.net/unsubscribe">Here</a> to unsubscribe</p>
                <div class="pivo_logo">
                    <a href="#">
                        <p>Powered by PivoApps</p>
                        <img src="https://firebasestorage.googleapis.com/v0/b/sproude-pos.appspot.com/o/files%2Fec1084bc-1792-4b0a-85ad-feb6a35f7f60?alt=media&token=72532b5b-b67e-4e07-968a-b2a7a41eef61" alt="">
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>