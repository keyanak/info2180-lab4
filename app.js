document.addEventListener('DOMContentLoaded', () => {
  const searchBtn = document.getElementById('searchBtn');
  const listBtn   = document.getElementById('listBtn');
  const searchField = document.getElementById('searchField');
  const resultDiv = document.getElementById('result');

  function setResult(html) {
    resultDiv.innerHTML = html;
  }

  // List All
  listBtn.addEventListener('click', () => {
    fetch('superheroes.php')
      .then(res => res.text())
      .then(text => {
        alert(text);
        setResult(text.replace(/<br>/g, '<br/>'));
      })
      .catch(() => {
        setResult('<p style="color:red;">Error fetching superhero list.</p>');
      });
  });

  // Search
  searchBtn.addEventListener('click', () => {
    const query = encodeURIComponent(searchField.value.trim());

    fetch(`superheroes.php?query=${query}`)
      .then(res => res.text())
      .then(data => {
        setResult(data);
      })
      .catch(() => {
        setResult('<p style="color:red;">Error performing search.</p>');
      });
  });

  // Enter triggers search
  searchField.addEventListener('keyup', (e) => {
    if (e.key === 'Enter') {
      searchBtn.click();
    }
  });
});
