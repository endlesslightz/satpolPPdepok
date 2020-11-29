$(function () {
    $('.js-sweetalert button').on('click', function () {
        var type = $(this).data('type');
        if (type === 'basic') {
            showBasicMessage();
        }
        else if (type === 'with-title') {
            showWithTitleMessage();
        }
        else if (type === 'success') {
            showSuccessMessage();
        }
        else if (type === 'tugas') {
          // alert($(this).attr("id"));
            showTugasMessage($(this).attr("id"));
        }
        else if (type === 'pantau') {
          // alert($(this).attr("id"));
            showPantauMessage($(this).attr("id"));
        }

        else if (type === 'adapantai1') {
          // alert($(this).attr("id"));
            showAda1Message($(this).attr("id"));
        }
        else if (type === 'adapantai2') {
          // alert($(this).attr("id"));
            showAda2Message($(this).attr("id"));
        }
        else if (type === 'adapantai3') {
          // alert($(this).attr("id"));
            showAda3Message($(this).attr("id"));
        }

        else if (type === 'confirm') {
            showConfirmMessage();
        }
        else if (type === 'confirmjurnal') {
            showConfirmJurnalMessage($(this).attr("id"));
        }
        else if (type === 'cancel') {
            showCancelMessage();
        }
        else if (type === 'with-custom-icon') {
            showWithCustomIconMessage();
        }
        else if (type === 'html-message') {
            showHtmlMessage();
        }
        else if (type === 'autoclose-timer') {
            showAutoCloseTimerMessage();
        }
        else if (type === 'prompt') {
            showPromptMessage();
        }
        else if (type === 'ajax-loader') {
            showAjaxLoaderMessage();
        }
    });
});

//These codes takes from http://t4t5.github.io/sweetalert/
function showBasicMessage() {
    swal("Here's a message!");
}

function showWithTitleMessage() {
    swal("Here's a message!", "It's pretty, isn't it?");
}

function showTugasMessage(id) {
  swal({
      title: "Apakah Anda Yakin?",
      text: "Anda tidak akan bisa menemukan data tugas ini lagi!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Ya, hapus!",
      closeOnConfirm: false
  }, function () {
      swal("Berhasil!", "Data tugas berhasil dihapus.", "success");
      window.location.href='../backend/tugas/delete?id='+id;
  });
}


function showPantauMessage(id) {
  swal({
      title: "Apakah Anda Yakin?",
      text: "Anda tidak akan bisa menemukan data titik pantau ini lagi!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Ya, hapus!",
      closeOnConfirm: false
  }, function () {
      swal("Berhasil!", "Data titik pantau berhasil dihapus.", "success");
      window.location.href='../backend/pantau/delete?id='+id;
  });
}

function showAda1Message(id) {
  swal({
      title: "Apakah Anda Yakin?",
      text: "Anda tidak akan bisa menemukan data ini lagi!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Ya, hapus!",
      closeOnConfirm: false
  }, function () {
      swal("Berhasil!", "Data berhasil dihapus.", "success");
      window.location.href='../adapantai/delete1?id='+id;
  });
}

function showAda2Message(id) {
  swal({
      title: "Apakah Anda Yakin?",
      text: "Anda tidak akan bisa menemukan data ini lagi!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Ya, hapus!",
      closeOnConfirm: false
  }, function () {
      swal("Berhasil!", "Data berhasil dihapus.", "success");
      window.location.href='../adapantai/delete2?id='+id;
  });
}

function showAda3Message(id) {
  swal({
      title: "Apakah Anda Yakin?",
      text: "Anda tidak akan bisa menemukan data ini lagi!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Ya, hapus!",
      closeOnConfirm: false
  }, function () {
      swal("Berhasil!", "Data berhasil dihapus.", "success");
      window.location.href='../adapantai/delete3?id='+id;
  });
}


function showConfirmMessage() {
    swal({
        title: "Apakah Anda Yakin?",
        text: "Anda tidak akan bisa menemukan data Petugas ini lagi!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, hapus!",
        closeOnConfirm: false
    }, function () {
        swal("Berhasil!", "Data Petugas berhasil dihapus.", "success");

        var pathArray = window.location.pathname.split('/');
        window.location.href='../delete?id='+pathArray[4];
    });
}

function showConfirmJurnalMessage(id) {
    swal({
        title: "Apakah Anda Yakin?",
        text: "Anda tidak akan bisa menemukan data jurnal ini lagi!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, hapus!",
        closeOnConfirm: false
    }, function () {
        swal("Berhasil!", "Data jurnal berhasil dihapus.", "success");
        // alert(id);
        // alert($(this).attr('id'));
        window.location.href='jurnal/delete?id='+id;
    });
}

function showCancelMessage() {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
        } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
    });
}

function showWithCustomIconMessage() {
    swal({
        title: "Sweet!",
        text: "Here's a custom image.",
        imageUrl: "../../images/thumbs-up.png"
    });
}

function showHtmlMessage() {
    swal({
        title: "HTML <small>Title</small>!",
        text: "A custom <span style=\"color: #CC0000\">html<span> message.",
        html: true
    });
}

function showAutoCloseTimerMessage() {
    swal({
        title: "Auto close alert!",
        text: "I will close in 2 seconds.",
        timer: 2000,
        showConfirmButton: false
    });
}

function showPromptMessage() {
    swal({
        title: "An input!",
        text: "Write something interesting:",
        type: "input",
        showCancelButton: true,
        closeOnConfirm: false,
        animation: "slide-from-top",
        inputPlaceholder: "Write something"
    }, function (inputValue) {
        if (inputValue === false) return false;
        if (inputValue === "") {
            swal.showInputError("You need to write something!"); return false
        }
        swal("Nice!", "You wrote: " + inputValue, "success");
    });
}

function showAjaxLoaderMessage() {
    swal({
        title: "Ajax request example",
        text: "Submit to run ajax request",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
    }, function () {
        setTimeout(function () {
            swal("Ajax request finished!");
        }, 2000);
    });
}
