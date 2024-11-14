<template>
  <div class="landing-page">
    <div class="container-fluid">
      <!-- First Row: Prompt Section -->
      <div class="row align-items-center rowPrompt">
        <div class="col-lg-5 d-flex justify-content-center align-items-center">
          <img src="/src/assets/roadmap.png" alt="Roadmap" class="img-fluid roadmapImg" />
        </div>

        <div class="col-lg-7">
          <h1 class="title mb-4">Build Your<br>Path to <span class="success">Success</span></h1>
          <p class="subtitle mb-4">Generate a personalized roadmap of your desired software engineering / information technology topics.</p>
          <div class="search-container">
            <input 
              type="text" 
              class="search-input" 
              v-model="query" 
              placeholder="What do you want to learn today? (e.g., Python, React, Java)"
              @keyup.enter="search"
            />
            <div class="search-button" @click="search">
              ✓
            </div>
          </div>

          <div class="suggested-topics">
            <div 
              class="topic-button" 
              v-for="topic in topics" 
              :key="topic" 
              @click="setQuery(topic)"
            >
              {{ topic }}
            </div>
          </div>
        </div>
      </div>

      <!-- Second Row: Features Section -->
      <div class="row rowFeatures">
        <div class="col-lg-6 features-title">
          <h1 class="title mb-2">Our Features</h1>
          <p class="subtitle mb-4">How Roadmap AI Helps You</p>
        </div>

        <div class="col-lg-6 features-cards">
          <div class="feature-card" v-for="(feature, index) in features" :key="index">
            <div class="feature-icon">✓</div>
            <div class="feature-content">
              <h3>{{ feature.title }}</h3>
              <p>{{ feature.description }}</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Third Row: How It Works Section -->

      <div class="row rowProcess">

        <div class="col-lg-12 text-center process-title">
          <h1 class="title mb-2">See how it works</h1>
          <p class="subtitle mb-4">Explore the steps and process</p>
        </div>

        <div class="row rowSteps">
          
          <div class="col step-cards" v-for="(step, index) in steps" :key="index" >
            <div class="number-icon">{{ step.icon }}</div>
            <h3 class="step-title">{{ step.title}}</h3>
              <p class="step-description">
                {{ step.description}}
              </p>
          </div>

        </div>
      </div>

      <div class="row rowFeatures">
        <div class="col-lg-6 testimonials">
          <h1 class="title mb-2">Testimonials</h1>
          <p class="subtitle mb-4">Why people love Roadmap AI</p>
        </div>

        <div class="col-lg-6 features-cards">
          <h1>Carousels</h1>
        </div>
      </div>

      <div class="row rowFAQs">
        <div class="col-lg-6 faqs">
          <h1 class="title mb-2">Frequently Asked Questions</h1>
          <p class="subtitle mb-4">Ready to create your own learning roadmap?</p>
        </div>

        <div class="col-lg-6 accordion-faqs">
          <div class="accordion accordion-flush custom-accordion" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                  What topics and languages are available on RoadmapAI?
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">RoadmapAI covers a variety of programming languages, frameworks, and software engineering topics, including but not limited to JavaScript, Python, Java, HTML/CSS, React, Vue, and databases like MySQL. Each topic is broken down into main topics with detailed subtopics, allowing users to dive into fundamental and advanced concepts in their chosen area of interest.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                  How does RoadmapAI track my learning progress?
                </button>
              </h2>
              <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">RoadmapAI tracks progress by allowing users to mark topics and subtopics as completed as they go through each section. The app calculates and displays a percentage of the roadmap completed, making it easy for users to track how far they've come and what remains to be covered.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                  What learning resources are available on RoadmapAI?
                </button>
              </h2>
              <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">For each topic, RoadmapAI provides detailed descriptions, definitions, sample code, and additional resources such as links to articles, tutorials, and videos. These resources are carefully curated to offer comprehensive support for learning each topic.</div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</template>

<script>
export default {
  name: 'LandingPage',
  data() {
    return {
      query: '',
      topics: [
        'Frontend Development', 
        'Backend Development', 
        'Full Stack Development', 
        'React', 
        'Python', 
        'JavaScript', 
        'TypeScript', 
        'Java',
        'HTML',
        'CSS'
      ],
      features: [
        { title: 'Personalized Roadmaps:', description: 'Customize your journey to your technology stack of choice.' },
        { title: 'Progress Tracker:', description: 'Visualize your learning progress and milestones.' },
        { title: 'Learning Materials:', description: 'Access descriptions, samples, and definitions for each subtopic.' },
        { title: 'External Resources:', description: 'Direct links to tutorials and documentation.' }
      ],
      steps: [
        { icon: "1", title: "Choose a topic.", description: "Select a language or topic that aligns with your career goals or personal interests." },
        { icon: "2", title: "Get a roadmap.", description: "RoadmapAI generates a tailored roadmap organized into main topics and essential subtopics." },
        { icon: "3", title: "Track Your Progress.", description: "Mark each completed topic to see your advancement on the roadmap, showing your learning progress." },
        { icon: "4", title: "Explore Resources", description: "Every topic consists of links to external resources—tutorials, articles, and documentation." }
      ]
    };
  },
  methods: {
    search() {
      if (this.query) {
        alert(`Searching for: ${this.query}`);
      }
    },
    setQuery(topic) {
      this.query = topic;
    }
  }
};
</script>

<style scoped>
@import './LandingPage.css';
</style>
