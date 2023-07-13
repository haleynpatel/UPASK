var tagInput = document.getElementById('tagInput');
var tagSuggestions = document.getElementById('tagSuggestions');
var selectedTag = { tag_name: '', tag_id: 0 }; // Initialize selectedTag

tagInput.addEventListener('input', function() {
  var input = tagInput.value;
  if (input.length > 0) {
    fetch('get_tag_suggestions.php?q=' + input)
      .then(response => response.json())
      .then(data => {
        tagSuggestions.innerHTML = '';
        data.forEach(tag => {
          var suggestion = document.createElement('div');
          suggestion.classList.add('suggestion');
          suggestion.textContent = tag.tag_name;
          suggestion.addEventListener('click', function() {
            tagInput.value = tag.tag_name;
            selectedTag = tag; // Assign selected tag to selectedTag
            tagSuggestions.innerHTML = '';
          });
          tagSuggestions.appendChild(suggestion);
        });
      });
  } else {
    tagSuggestions.innerHTML = '';
    selectedTag = { tag_name: '', tag_id: 0 }; // Reset selectedTag
  }
});