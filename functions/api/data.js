// GRIDIFY - Portfolio and Services Data
// This file exports all static data for the portfolio website

export const siteData = {
  metadata: {
    name: 'GRIDIFY',
    domain: 'UNAUX',
    description: 'Modern portfolio and services showcase',
    version: '1.0.0'
  },
  
  navigation: [
    { label: 'Home', path: '/', id: 'home' },
    { label: 'About', path: '/about', id: 'about' },
    { label: 'Services', path: '/services', id: 'services' },
    { label: 'Portfolio', path: '/portfolio', id: 'portfolio' },
    { label: 'Contact', path: '/contact', id: 'contact' }
  ],
  
  services: [
    {
      id: 'web-design',
      title: 'Web Design',
      description: 'Stunning, responsive website designs that engage users',
      icon: 'pen-tool',
      color: '#90EE90'
    },
    {
      id: 'web-development',
      title: 'Web Development',
      description: 'Full-stack development using modern technologies',
      icon: 'code',
      color: '#90EE90'
    },
    {
      id: 'ui-ux',
      title: 'UI/UX Design',
      description: 'User-centered design for optimal experience',
      icon: 'layers',
      color: '#90EE90'
    }
  ],
  
  portfolio: [
    {
      id: 'project-1',
      title: 'Project One',
      category: 'Web Design',
      description: 'A showcase project',
      image: '/img/portfolio-1.jpg',
      link: '/portfolio/project-1'
    },
    {
      id: 'project-2',
      title: 'Project Two',
      category: 'Development',
      description: 'Another amazing project',
      image: '/img/portfolio-2.jpg',
      link: '/portfolio/project-2'
    }
  ],
  
  footer: {
    copyright: '2025 GRIDIFY. All rights reserved.',
    links: [
      { label: 'Privacy Policy', path: '/privacy' },
      { label: 'Terms of Service', path: '/terms' }
    ]
  }
};

export default siteData;
