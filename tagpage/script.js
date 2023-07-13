const skills = [
    "HTML",
    "CSS",
    "JavaScript",
    "Python",
    "Java",
    "C++",
    "PHP",
    "Ruby",
    "Swift",
    "TypeScript",
    "React",
    "Angular",
    "Vue",
    "Node.js",
    "SQL",
    "MongoDB"
  ];
 
  const searchInput = document.getElementById("searchInput");
  const autocompleteContainer = document.getElementById("autocompleteContainer");
  const selectedSkillsContainer = document.getElementById("selectedSkills");
 
  searchInput.addEventListener("input", handleInput);
  document.addEventListener("click", clearAutocomplete);
 
  function handleInput() {
    const searchValue = searchInput.value.toLowerCase();
    const filteredSkills = skills.filter(skill =>
      skill.toLowerCase().startsWith(searchValue)
    );
 
    renderAutocomplete(filteredSkills);
  }
 
  function renderAutocomplete(filteredSkills) {
    autocompleteContainer.innerHTML = "";
 
    filteredSkills.forEach(skill => {
      const autocompleteItem = document.createElement("div");
      autocompleteItem.classList.add("autocomplete-item");
      autocompleteItem.innerText = skill;
      autocompleteItem.addEventListener("click", () => addSkill(skill));
      autocompleteContainer.appendChild(autocompleteItem);
    });
 
    autocompleteContainer.style.display = filteredSkills.length > 0 ? "block" : "none";
  }
 
  function addSkill(skill) {
    if (!isSkillSelected(skill)) {
      const selectedSkill = document.createElement("span");
      selectedSkill.classList.add("selected-skill");
      selectedSkill.innerText = skill;
      selectedSkill.addEventListener("click", () => removeSkill(skill));
      selectedSkillsContainer.appendChild(selectedSkill);
 
      const separator = document.createElement("span");
     // separator.innerText = "; ";
      selectedSkillsContainer.appendChild(separator);
 
      searchInput.value = "";
      autocompleteContainer.innerHTML = "";
    }
  }
 
  function removeSkill(skill) {
    const selectedSkills = selectedSkillsContainer.getElementsByClassName("selected-skill");
    const selectedSeparators = selectedSkillsContainer.getElementsByTagName("span");
    for (let i = 0; i < selectedSkills.length; i++) {
      if (selectedSkills[i].innerText === skill) {
        selectedSkillsContainer.removeChild(selectedSkills[i]);
        selectedSkillsContainer.removeChild(selectedSeparators[i]);
        break;
      } 
      else
      {
        selectedSkillsContainer.removeChild(selectedSkills[i]);
        selectedSkillsContainer.removeChild(selectedSeparators[i]);
        break;
      }
    }
  }
 
  function isSkillSelected(skill) {
    const selectedSkills = selectedSkillsContainer.getElementsByClassName("selected-skill");
    for (let i = 0; i < selectedSkills.length; i++) {
      if (selectedSkills[i].innerText === skill) {
        return true;
      }
    }
    return false;
  }
 
  function clearAutocomplete(event) {
    if (!searchInput.contains(event.target) && !autocompleteContainer.contains(event.target)) {
      autocompleteContainer.style.display = "none";
    }
  }
 



