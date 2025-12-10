@extends('layouts')
@section('title')
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
  <div class="flex items-center space-x-3 mb-4 lg:mb-0">
   <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-2xl flex items-center justify-center ring-4 ring-indigo-100/50">
  <i class="fas fa-chart-pie text-white text-xl"></i>
</div>
    <div>
      <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">Tableau de Bord Personnel</h1>
      <p class="text-gray-500 mt-1">Aperçu de vos performances et statistiques</p>
    </div>
  </div>

  <nav class="flex items-center text-sm">
    <a href="#" class="text-gray-500 hover:text-primary-600 transition-colors duration-200">
      <i class="fas fa-home mr-1"></i>Accueil
    </a>
    <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
    <span class="text-gray-700 font-medium">Tableau de Bord</span>
  </nav>
</div>
@endsection

@section('content')
<div class="space-y-8">
  <!-- Cartes de statistiques -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    @php
      $stats = [
        [
          'title' => 'Contenus Publiés',
          'value' => '18',
          'trend' => '+12%',
          'color' => 'primary',
          'icon' => 'newspaper',
          'period' => 'ce mois'
        ],
        [
          'title' => 'Contenus Lus',
          'value' => '42',
          'trend' => '+23%',
          'color' => 'green',
          'icon' => 'eye',
          'period' => 'ce mois'
        ],
        [
          'title' => 'Contenus Achetés',
          'value' => '6',
          'trend' => '+8%',
          'color' => 'amber',
          'icon' => 'shopping-cart',
          'period' => 'ce mois'
        ],
        [
          'title' => 'Score Éditeur',
          'value' => '85%',
          'trend' => 'Excellent',
          'color' => 'blue',
          'icon' => 'chart-line',
          'period' => ''
        ]
      ];
    @endphp

    @foreach($stats as $stat)
    <div class="group bg-transparent rounded-2xl border border-gray-200/80 transition-all duration-300 hover:-translate-y-1 hover:border-{{ $stat['color'] }}-300 hover:bg-{{ $stat['color'] }}-50/20">
      <div class="p-6">
        <div class="flex justify-between items-start">
          <div>
            <p class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">{{ $stat['title'] }}</p>
            <p class="text-3xl font-bold text-gray-900 mb-2">{{ $stat['value'] }}</p>
            <div class="flex items-center gap-2">
              <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-{{ $stat['color'] }}-100 text-{{ $stat['color'] }}-800 border border-{{ $stat['color'] }}-200">
                @if($stat['color'] === 'blue')
                  <i class="fas fa-star mr-1.5 text-xs"></i>{{ $stat['trend'] }}
                @else
                  <i class="fas fa-arrow-up mr-1.5 text-xs"></i>{{ $stat['trend'] }}
                @endif
              </span>
              @if($stat['period'])
                <span class="text-xs text-gray-500">{{ $stat['period'] }}</span>
              @endif
            </div>
          </div>
          <div class="p-3 bg-{{ $stat['color'] }}-50 rounded-xl group-hover:bg-{{ $stat['color'] }}-100 transition-colors duration-300">
            <i class="fas fa-{{ $stat['icon'] }} text-{{ $stat['color'] }}-500 text-2xl"></i>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <!-- Section Contenus Publiés -->
  <div class="bg-transparent rounded-2xl border border-gray-200/80 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
      <div>
        <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-3">
          <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center">
            <i class="fas fa-newspaper text-primary-500"></i>
          </div>
          Mes Contenus Publiés
        </h3>
        <p class="text-gray-500 text-sm mt-1 ml-13">Les contenus que vous avez créés et publiés</p>
      </div>
      <a href="{{ route('editeur.contenus.index') }}" 
         class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-gradient-to-r from-primary-500 to-primary-600 text-black font-semibold rounded-lg hover:from-primary-600 hover:to-primary-700 transition-all duration-300 active:scale-95">
        <i class="fas fa-plus"></i>
        <span>Nouveau Contenu</span>
      </a>
    </div>
    
    <div class="p-6">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
          $contents = [
            [
              'title' => 'Festival International Ouidah 2024',
              'type' => 'Article',
              'date' => '15/03/24',
              'description' => 'Célébration annuelle de la culture vodoun avec des cérémonies traditionnelles...',
              'views' => '1.2k',
              'likes' => '89',
              'image' => 'vodunday.jpg'
            ],
            [
              'title' => 'Artisanat Local Béninois',
              'type' => 'Vidéo',
              'date' => '10/03/24',
              'description' => 'Découverte des techniques ancestrales de tissage et de poterie...',
              'views' => '2.4k',
              'likes' => '156',
              'image' => 'fond1.jpg'
            ],
            [
              'title' => 'Musique Traditionnelle',
              'type' => 'Podcast',
              'date' => '05/03/24',
              'description' => 'Exploration des rythmes et instruments traditionnels du Bénin...',
              'views' => '890',
              'likes' => '67',
              'image' => 'musique.jpg'
            ]
          ];
        @endphp

        @foreach($contents as $content)
        <div class="group bg-white border border-gray-200 rounded-xl overflow-hidden hover:border-primary-300 transition-all duration-300">
          <div class="relative h-48 overflow-hidden">
            <img src="{{ asset('adminlte/img/' . $content['image']) }}" 
                 alt="{{ $content['title'] }}" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
            <div class="absolute top-3 right-3">
              <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-500 text-white shadow-sm">
                Publié
              </span>
            </div>
            <div class="absolute bottom-3 left-3">
              <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-primary-700 rounded-lg text-xs font-semibold">
                {{ $content['type'] }}
              </span>
            </div>
          </div>
          
          <div class="p-5">
            <div class="flex justify-between items-start mb-3">
              <h4 class="font-semibold text-gray-900 line-clamp-2">{{ $content['title'] }}</h4>
              <span class="text-sm text-gray-500 whitespace-nowrap">
                <i class="far fa-calendar-alt mr-1"></i>{{ $content['date'] }}
              </span>
            </div>
            
            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $content['description'] }}</p>
            
            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
              <div class="flex items-center gap-4">
                <span class="flex items-center text-sm text-gray-500 gap-1">
                  <i class="far fa-eye"></i>
                  <span>{{ $content['views'] }}</span>
                </span>
                <span class="flex items-center text-sm text-gray-500 gap-1">
                  <i class="far fa-heart"></i>
                  <span>{{ $content['likes'] }}</span>
                </span>
              </div>
              <a href="#" class="inline-flex items-center text-primary-600 font-medium text-sm hover:text-primary-700 gap-1 group/link">
                <span>Voir détails</span>
                <i class="fas fa-arrow-right text-xs group-hover/link:translate-x-1 transition-transform"></i>
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      
      <!-- <div class="mt-8 text-center">
        <a href="{{ route('contenus.index') }}" 
           class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium gap-2 group">
          <span>Voir tous mes contenus</span>
          <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
        </a>
      </div> -->
    </div>
  </div>

  <!-- Section Contenus Lus et Achetés -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Contenus Lus -->
    <div class="bg-transparent rounded-2xl border border-gray-200/80 overflow-hidden">
      <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-3">
          <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
            <i class="fas fa-eye text-green-500"></i>
          </div>
          Contenus Récemment Lus
        </h3>
      </div>
      
      <div class="p-6">
        <div class="space-y-3">
          @for($i = 1; $i <= 4; $i++)
          <div class="flex items-center p-3 rounded-lg hover:bg-gray-50/50 transition-colors duration-200 group">
            <div class="flex-shrink-0 w-12 h-12 rounded-lg overflow-hidden border border-gray-200">
              <img src="{{ asset('adminlte/img/gaani.jpg') }}" 
                   alt="Contenu" 
                   class="w-full h-full object-cover">
            </div>
            
            <div class="ml-4 flex-1 min-w-0">
              <h4 class="font-medium text-gray-900 truncate group-hover:text-primary-600 transition-colors">
                Fête du Gaani à Nikki
              </h4>
              <div class="flex items-center flex-wrap gap-2 mt-1">
                <span class="px-2 py-0.5 bg-gray-100 text-gray-700 rounded text-xs">Article</span>
                <span class="text-xs text-gray-500 flex items-center gap-1">
                  <i class="far fa-clock"></i>
                  <span>12 min</span>
                </span>
                <span class="text-xs text-gray-500">{{ now()->subDays($i)->format('d/m/Y') }}</span>
              </div>
            </div>
            
            <button class="p-2 text-gray-400 hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-colors duration-200 ml-2">
              <i class="fas fa-redo"></i>
            </button>
          </div>
          @endfor
        </div>
        
        <div class="mt-6">
          <a href="#" class="inline-flex items-center justify-center w-full py-3 px-4 border border-gray-300 rounded-lg text-gray-700 font-medium hover:border-primary-300 hover:text-primary-600 hover:bg-gray-50 transition-colors duration-200 gap-2">
            <i class="fas fa-history"></i>
            <span>Voir l'historique complet</span>
          </a>
        </div>
      </div>
    </div>

    <!-- Contenus Achetés -->
    <div class="bg-transparent rounded-2xl border border-gray-200/80 overflow-hidden">
      <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-3">
          <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center">
            <i class="fas fa-shopping-cart text-amber-500"></i>
          </div>
          Mes Contenus Achetés
        </h3>
      </div>
      
      <div class="p-6">
        <div class="space-y-4">
          @for($i = 1; $i <= 3; $i++)
          <div class="p-4 rounded-xl border border-gray-200 hover:border-amber-300 hover:bg-amber-50/20 transition-all duration-300">
            <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-3 mb-3">
              <div class="flex items-center flex-wrap gap-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-gradient-to-r from-amber-500 to-orange-500 text-white text-xs font-semibold rounded-full">
                  <i class="fas fa-crown text-xs"></i>
                  <span>PREMIUM</span>
                </span>
                <span class="text-sm font-semibold text-amber-600">500 FCFA</span>
              </div>
              <span class="text-xs text-gray-500">
                Expire le {{ now()->addDays(30-$i*3)->format('d/m') }}
              </span>
            </div>
            
            <h4 class="font-semibold text-gray-900 mb-2 line-clamp-2">Les Rois du Dahomey : Histoire et Héritage</h4>
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mt-4 pt-4 border-t border-gray-100">
              <div class="flex items-center text-sm text-gray-500 gap-2">
                <i class="fas fa-video"></i>
                <span>Documentaire • 45 min</span>
              </div>
              
              <div class="flex items-center gap-2">
                <button class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-primary-50 text-primary-600 rounded-lg text-sm font-medium hover:bg-primary-100 transition-colors duration-200">
                  <i class="fas fa-play"></i>
                  <span>Visionner</span>
                </button>
                <button class="p-1.5 text-gray-400 hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-colors duration-200">
                  <i class="fas fa-download"></i>
                </button>
              </div>
            </div>
          </div>
          @endfor
        </div>
        
        <div class="mt-6">
          <a href="#" class="inline-flex items-center justify-center w-full py-3 px-4 bg-gradient-to-r from-amber-50 to-orange-50 border border-amber-200 rounded-lg text-amber-700 font-medium hover:border-amber-300 hover:from-amber-100 hover:to-orange-100 transition-all duration-200 gap-2">
            <i class="fas fa-store"></i>
            <span>Explorer la boutique premium</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Graphique d'activité
  const activityCtx = document.getElementById('activityChart').getContext('2d');
  new Chart(activityCtx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
      datasets: [
        {
          label: 'Contenus Publiés',
          data: [12, 19, 8, 15, 22, 18, 25, 12, 19, 23, 15, 20],
          borderColor: '#6366f1',
          backgroundColor: 'rgba(99, 102, 241, 0.05)',
          borderWidth: 3,
          fill: true,
          tension: 0.4,
          pointBackgroundColor: '#6366f1',
          pointBorderColor: '#fff',
          pointBorderWidth: 2,
          pointRadius: 4,
          pointHoverRadius: 6
        },
        {
          label: 'Contenus Lus',
          data: [8, 15, 12, 19, 25, 22, 30, 25, 22, 28, 20, 25],
          borderColor: '#10b981',
          backgroundColor: 'rgba(16, 185, 129, 0.05)',
          borderWidth: 3,
          fill: true,
          tension: 0.4,
          pointBackgroundColor: '#10b981',
          pointBorderColor: '#fff',
          pointBorderWidth: 2,
          pointRadius: 4,
          pointHoverRadius: 6
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          backgroundColor: 'rgba(255, 255, 255, 0.95)',
          titleColor: '#111827',
          bodyColor: '#374151',
          borderColor: '#e5e7eb',
          borderWidth: 1,
          padding: 12,
          cornerRadius: 8,
          boxPadding: 6,
          usePointStyle: true
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            drawBorder: false,
            color: 'rgba(0, 0, 0, 0.03)'
          },
          ticks: {
            padding: 10,
            color: '#6b7280'
          }
        },
        x: {
          grid: {
            display: false
          },
          ticks: {
            padding: 10,
            color: '#6b7280'
          }
        }
      },
      interaction: {
        intersect: false,
        mode: 'index'
      }
    }
  });

  // Graphique de type
  const typeCtx = document.getElementById('typeChart').getContext('2d');
  new Chart(typeCtx, {
    type: 'doughnut',
    data: {
      labels: ['Articles', 'Vidéos', 'Podcasts', 'Interviews'],
      datasets: [{
        data: [40, 25, 20, 15],
        backgroundColor: [
          '#6366f1',
          '#10b981',
          '#3b82f6',
          '#f59e0b'
        ],
        borderColor: '#ffffff',
        borderWidth: 3,
        hoverOffset: 10,
        hoverBackgroundColor: [
          '#4f46e5',
          '#059669',
          '#2563eb',
          '#d97706'
        ]
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      cutout: '70%',
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          backgroundColor: 'rgba(255, 255, 255, 0.95)',
          titleColor: '#111827',
          bodyColor: '#374151',
          borderColor: '#e5e7eb',
          borderWidth: 1,
          padding: 12,
          cornerRadius: 8,
          callbacks: {
            label: function(context) {
              return `${context.label}: ${context.raw}%`;
            }
          }
        }
      }
    }
  });
</script>

<!-- Styles personnalisés -->
<style>
  .animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
  }
  
  @keyframes pulse {
    0%, 100% {
      opacity: 1;
      transform: scale(1);
    }
    50% {
      opacity: 0.8;
      transform: scale(1.05);
    }
  }
  
  .line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  
  /* Définir les couleurs personnalisées */
  :root {
    --primary-50: #eef2ff;
    --primary-100: #e0e7ff;
    --primary-500: #6366f1;
    --primary-600: #4f46e5;
    --primary-700: #4338ca;
  }
  
  .border-primary-500 {
    border-color: var(--primary-500);
  }
  
  .bg-primary-50 {
    background-color: var(--primary-50);
  }
  
  .text-primary-500 {
    color: var(--primary-500);
  }
  
  .hover\:bg-primary-100:hover {
    background-color: var(--primary-100);
  }
  
  .bg-primary-100 {
    background-color: var(--primary-100);
  }
  
  .text-primary-600 {
    color: var(--primary-600);
  }
  
  .bg-primary-500 {
    background-color: var(--primary-500);
  }
  
  .from-primary-500 {
    --tw-gradient-from: var(--primary-500);
  }
  
  .to-primary-600 {
    --tw-gradient-to: var(--primary-600);
  }
  
  .hover\:from-primary-600:hover {
    --tw-gradient-from: var(--primary-600);
  }
  
  .hover\:to-primary-700:hover {
    --tw-gradient-to: var(--primary-700);
  }
</style>
@endsection
