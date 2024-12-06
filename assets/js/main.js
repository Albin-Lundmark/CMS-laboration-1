addEventListener('DOMContentLoaded', () => {
  // En enkel meny för mobilt läge
  // Deklarerar const för att hämta elementen
  const hamburger = document.querySelector('.hamburger')
  const navbar = document.querySelector('.navbar')

  if (hamburger && navbar) {
    hamburger.addEventListener('click', () => {
      const isHidden = navbar.classList.contains('hidden')

      navbar.classList.toggle('hidden')
      hamburger.setAttribute('aria-expanded', !isHidden)
    })
  }

  // Sidebar för olika undersidor
  // Deklarerar const för att hämta elementen
  const sidebar = document.querySelector('#sidebar')
  const toggleButton = document.querySelector('#toggleSidebar')
  const closeButton = document.querySelector('#closeSidebar')
  const sidebarLeft = document.querySelector('#sidebarLeft')
  const toggleButtonLeft = document.querySelector('#toggleSidebarLeft')
  const closeButtonLeft = document.querySelector('#closeSidebarLeft')

  // Visa eller göm höger sidebar widget

  if (toggleButton && closeButton && sidebar) {
    toggleButton.addEventListener('click', function () {
      sidebar.classList.toggle('translate-x-full')
    })

    closeButton.addEventListener('click', function () {
      sidebar.classList.add('translate-x-full')
    })
  }

  // Visa eller göm vänster sidebar widget

  if (toggleButtonLeft && closeButtonLeft && sidebarLeft) {
    toggleButtonLeft.addEventListener('click', function () {
      sidebarLeft.classList.toggle('-translate-x-full')
    })

    closeButtonLeft.addEventListener('click', function () {
      sidebarLeft.classList.add('-translate-x-full')
    })
  }
})
