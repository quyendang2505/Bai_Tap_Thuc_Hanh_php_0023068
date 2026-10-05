import $ from 'jquery';

window.$ = window.jQuery = $;

import 'toastr/build/toastr.min.css';
import toastr from 'toastr';

toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: 'toast-top-right',
    timeOut: 4000,
};

window.toastr = toastr;
