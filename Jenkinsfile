pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Build Docker Image') {
            steps {
                sh 'docker build -t naufal354/kelompok2paw:latest .'
            }
        }

        stage('Test') {
            steps {
                echo 'Menjalankan pengujian aplikasi...'
                sh 'docker run --rm naufal354/kelompok2paw:latest pytest || true'
            }
        }

        stage('Push Docker Image') {
            steps {
                withCredentials([string(credentialsId: 'dockerhub-token', variable: 'DOCKERHUB_TOKEN')]) {
                    sh 'echo "$DOCKERHUB_TOKEN" | docker login -u naufal354 --password-stdin'
                    sh 'docker push naufal354/kelompok2paw:latest'
                }
            }
        }

        stage('Deploy') {
            steps {
                echo 'Menjalankan container hasil build...'
                sh '''
                docker stop myapp || true
                docker rm myapp || true
                docker run -d --name myapp -p 8000:80 naufal354/kelompok2paw:latest
                '''
            }
        }
    }
}
