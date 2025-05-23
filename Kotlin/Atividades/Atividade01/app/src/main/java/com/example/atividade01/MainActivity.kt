package com.example.atividade01

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.padding
import androidx.compose.material3.Card
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.unit.dp

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
           contatos()
        }
    }
}


@Composable
fun contatos() {
    Box(
        modifier = Modifier
            .fillMaxSize()
            .background(Color(0xFF483A58))
            .padding(16.dp)
    ) {
        Column(
            modifier = Modifier.fillMaxSize(),
            verticalArrangement = Arrangement.Center,
            horizontalAlignment = Alignment.CenterHorizontally
        ) {
            ContatoCard(
                nome = "Gustavo Pavani",
                telefone = "(15) 99602-9695",
                email = "gustavo@gmail.com"
            )

            Spacer(modifier = Modifier.height((24.dp)))

            ContatoCard(
                nome = "Guilherme Pavani",
                telefone = "(21) 98721-9493",
                email = "guilherme@gmail.com"
            )
        }
    }
}

@Composable
fun ContatoCard(nome: String, telefone: String, email: String) {
    Card(
        modifier = Modifier
            .fillMaxWidth()
            .padding(8.dp)
    ) {
        Column(
            modifier = Modifier.padding(16.dp),
            horizontalAlignment = Alignment.CenterHorizontally
        ) {
            Box(){
                Column {
                    Text("Nome: $nome")
                    Text("Tel: $telefone")
                    Text("Email: $email")
                }
            }

        }
    }
}
