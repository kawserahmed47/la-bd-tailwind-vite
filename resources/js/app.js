import './bootstrap';
import $ from "jquery";
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'
import Swal from 'sweetalert2'
import 'flowbite';
import { Modal } from 'flowbite';
import Dropzone from "dropzone"

window.Dropzone = Dropzone
// jquery
window.$ = $;

// aplinejs
Alpine.plugin(persist)
window.Alpine = Alpine
Alpine.start()

// sweetalert2
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  window.Toast = Toast;

 
