import './bootstrap';
import '../fomantic/dist/semantic.min';

$(document).ready(function () {
  initComponents();
});

$(document).on('livewire:initialized', function () {
  initComponents();

  Livewire.hook('morph.updated', ({el, component}) => {
    initComponents();
  });

  Livewire.on('child-check-change', function (data) {
    $('#select_all').closest('.ui.checkbox').checkbox('set ' + data.set);
  });

  Livewire.on('show-message', function (data) {
    if (data.modal) {
      $("[modal='" + data.modal + "']").modal('hide');
    }

    if (data.dropdown){
      $("[modal='" + data.modal + "']").find('.ui.dropdown').dropdown('clear').dropdown('set text', 'seleccionar');
    }

    showToast(data.type, data.message);
  });

  Livewire.on('open-modal', function (data) {
    $("[modal='" + data.modal + "']").modal({
      detachable: false,
      closable: false,
      inverted: true,
      transition: 'fade up',
      allowMultiple: false,
      onShow: function () {
        $('.ui.dimmer').addClass('inverted');
        initComponents();
      },
      onHidden: function () {
        $(this).modal('destroy');
      }
    }).modal('show');
  });

  Livewire.on('reset-modal-dropdown', function (data) {
    $("[modal='" + data.modal + "']").find('.ui.dropdown').dropdown('clear').dropdown('set text', 'seleccionar');
  });
});

$(document).on('livewire:navigated', function () {
  initComponents();
});

function initComponents() {
  $('#nav-section').visibility({
    once: false,
    onBottomPassed: function () {
      $('#attached-navbar').transition('fade in');
    },
    onBottomPassedReverse: function () {
      $('#attached-navbar').transition('fade out');
    }
  });

  $('.ui.dropdown').each(function () {
    $(this).dropdown();
  })
  $('.ui.selection.dropdown').each(function () {
    $(this).dropdown({
      allowTab: false,
      selectOnKeydown: false,
      ignoreDiacritics: true,
      sortSelect: true,
      fullTextSearch: 'exact',
      message: {
        addResult: 'Añadir <b>{term}</b>',
        count: '{count} seleccionado(s)',
        maxSelections: '{maxCount} selecciones máx',
        noResults: 'Sin results.'
      }
    })
  });

  $('.ui.checkbox').each(function () {
    $(this).checkbox();
  });

  $('.ui.accordion').accordion({
    onOpen: function () {
      $(this).closest('.ui.modal').modal('refresh');
    },
    onClose: function () {
      $(this).closest('.ui.modal').modal('refresh');
    }
  });

  $("[type='password']").closest('.field').find('.ui.toggle').each(function () {
    $(this).state({
      text: {
        active: '<i class="eye slash outline icon"></i>',
        inactive: '<i class="eye outline icon"></i>'
      },
      className: {
        active: 'secondary'
      },
      onChange: function () {
        var passwordField = $(this).closest('.field').find('input');

        if (passwordField.attr('type') === 'password') {
          passwordField.attr('type', 'text').focus();
        } else {
          passwordField.attr('type', 'password').focus();
        }
      }
    });
  });
}

function showToast(type, message) {
  $.toast({
    class: type,
    title: function () {
      switch (type) {
        case 'error':
          return '¡Error!'
        case 'warning':
          return 'Atención:'
        case 'info':
          return 'Importante:'
        case 'success':
          return '¡Éxito!'
      }
    },
    message: message,
    displayTime: 'auto',
    showProgress: 'top',
    position: 'bottom left',
    className: {
      toast: 'ui large message'
    },
    transition: {
      showMethod: 'fly right',
      hideMethod: 'fly right',
      closeEasing: 'easeOutBounce'
    },
  });
}
