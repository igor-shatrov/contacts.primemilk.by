pipeline {
  agent any
  stages {
    stage('pull') {
      steps {
        git(url: 'https://github.com/igor-shatrov/contacts.primemilk.by.git', branch: 'master')
        sh 'ls'
      }
    }

    stage('copy to server') {
      steps {
        sh 'scp ../contacts.primemilk.by administrator@192.168.221.128:/sites/new -p master'
        archiveArtifacts '../contacts.primemilk.by'
      }
    }

  }
}