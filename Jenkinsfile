pipeline {
  agent any
  stages {
    stage('pull') {
      steps {
        git(url: 'https://github.com/igor-shatrov/contacts.primemilk.by.git', branch: 'master')
        sh 'ls'
      }
    }

  }
}