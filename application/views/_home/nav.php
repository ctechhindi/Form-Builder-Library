<ul>
  <li>
    <a href="<?= base_url('User/form'); ?>">Form</a>
  </li>
  <li>
    <a href="<?= base_url('User/form_inline'); ?>">Inline Form</a>
  </li>
  <li>
    <select onchange="ChangeTheme()" id="themes">
      <option value="bootstrap4" <?= ($this->session->userdata('theme') == 'bootstrap4')? 'selected':'' ?> >Bootstrap v4.0.0-beta</option>
      <option value="bootstrap3" <?= ($this->session->userdata('theme') == 'bootstrap3')? 'selected':'' ?>>Bootstrap v3.3.5</option>
      <option value="semantic2" <?= ($this->session->userdata('theme') == 'semantic2')? 'selected':'' ?>>Semantic v2.2.13</option>
    </select>
  </li>
</ul>
<script>
  function ChangeTheme()
  {
    var theme = $("#themes").val();
    $.ajax({
      type: "GET",
      url:  "<?= base_url('chanage/theme'); ?>",
      data: { theme: theme },
      cache: false,
      dataType: "json",
      success: function(msg) {
          location.reload();
      },
      error: function () {
          location.reload();
      },
    });
  }
</script>