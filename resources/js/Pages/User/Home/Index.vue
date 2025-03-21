<template>
    <div class="font-sans bg-gray-50">

  
      <!-- Hero Section -->
      <section class="bg-white text-white py-20">
        <div class="container mx-auto px-6 text-center">
          <h1 class="text-5xl text-black font-bold mb-4">Take Control of Your Finances</h1>
          <p class="text-xl mb-8 text-black">Manage your income, expenses, and savings all in one place. Start saving smarter today!</p>

          <Link :href="route('user.auth.showLoginForm')" class=" text-white bg-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-blue-500">Get Started for Free</Link>
        
        </div>
      </section>
  
      <!-- Features Section -->
      <section class="py-16">
        <div class="container mx-auto px-6">
          <h2 class="text-3xl font-bold text-center mb-12">Why Choose Saving Wallet?</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature Card 1 -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
              <div class="text-blue-600 text-4xl mb-4">📊</div>
              <h3 class="text-xl font-bold mb-2">Track Income & Expenses</h3>
              <p class="text-gray-600">Easily log and categorize your transactions.</p>
            </div>
            <!-- Feature Card 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
              <div class="text-blue-600 text-4xl mb-4">🗂️</div>
              <h3 class="text-xl font-bold mb-2">Custom Categories</h3>
              <p class="text-gray-600">Create your own categories for personalized tracking.</p>
            </div>
            <!-- Feature Card 3 -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
              <div class="text-blue-600 text-4xl mb-4">📈</div>
              <h3 class="text-xl font-bold mb-2">Visual Reports</h3>
              <p class="text-gray-600">View your financial health with interactive charts.</p>
            </div>
            <!-- Feature Card 4 -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
              <div class="text-blue-600 text-4xl mb-4">🔒</div>
              <h3 class="text-xl font-bold mb-2">Secure & Private</h3>
              <p class="text-gray-600">Your data is safe with us. We prioritize your privacy.</p>
            </div>
          </div>
        </div>
      </section>
  
      <!-- How It Works Section -->
      <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-6">
          <h2 class="text-3xl font-bold text-center mb-12">How Saving Wallet Works</h2>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Step 1 -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
              <div class="text-blue-600 text-4xl mb-4">1</div>
              <h3 class="text-xl font-bold mb-2">Sign Up in Seconds</h3>
              <p class="text-gray-600">Create your account quickly and easily.</p>
            </div>
            <!-- Step 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
              <div class="text-blue-600 text-4xl mb-4">2</div>
              <h3 class="text-xl font-bold mb-2">Add Your Transactions</h3>
              <p class="text-gray-600">Log your income and expenses with ease.</p>
            </div>
            <!-- Step 3 -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
              <div class="text-blue-600 text-4xl mb-4">3</div>
              <h3 class="text-xl font-bold mb-2">Track & Save</h3>
              <p class="text-gray-600">Monitor your finances and save smarter.</p>
            </div>
          </div>
        </div>
      </section>
  

  
      <!-- Footer Section -->
      <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-6">
          <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Quick Links -->
            <div>
              <h4 class="font-bold mb-4">Quick Links</h4>
              <ul class="space-y-2">
                <li><a href="#" class="hover:text-blue-400">Home</a></li>
                <li><a href="#" class="hover:text-blue-400">Features</a></li>
                <li><a href="#" class="hover:text-blue-400">Pricing</a></li>
                <li><a href="#" class="hover:text-blue-400">About Us</a></li>
                <li><a href="#" class="hover:text-blue-400">Contact</a></li>
              </ul>
            </div>
            <!-- Social Media -->
            <div>
              <h4 class="font-bold mb-4">Follow Us</h4>
              <div class="flex space-x-4">
                <a href="#" class="hover:text-blue-400">Facebook</a>
                <a href="#" class="hover:text-blue-400">Twitter</a>
                <a href="#" class="hover:text-blue-400">LinkedIn</a>
              </div>
            </div>
            <!-- Newsletter -->
            <div class="col-span-2">
              <h4 class="font-bold mb-4">Stay Updated</h4>
              <form class="flex">
                <input type="email" placeholder="Enter your email" class="flex-grow p-2 rounded-l-md text-gray-800">
                <button type="submit" class="bg-blue-600 px-4 py-2 rounded-r-md hover:bg-blue-700">Subscribe</button>
              </form>
            </div>
          </div>
          <!-- Copyright -->
          <div class="text-center mt-8 pt-8 border-t border-gray-700">
            <p>© 2025 Saving Wallet. All rights reserved.</p>
          </div>
        </div>
      </footer>
    </div>
  </template>
  
  <script setup>

import { Link } from '@inertiajs/vue3';
 
  </script>
  