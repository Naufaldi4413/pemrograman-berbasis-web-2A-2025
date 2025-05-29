document.addEventListener("DOMContentLoaded", () => {
  const forms = document.querySelectorAll("form");
  forms.forEach(form => {
    form.addEventListener("submit", e => {
      const inputs = form.querySelectorAll("input[required]");
      for (let input of inputs) {
        if (!input.value.trim()) {
          alert("Mohon isi semua kolom wajib!");
          input.focus();
          e.preventDefault();
          return false;
        }
      }
    });
  });
});