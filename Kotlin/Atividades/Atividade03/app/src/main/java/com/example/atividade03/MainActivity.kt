package com.example.atividade03

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.activity.enableEdgeToEdge
import androidx.compose.foundation.background
import androidx.compose.foundation.clickable
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.layout.size
import androidx.compose.foundation.shape.CircleShape
import androidx.compose.material3.Card
import androidx.compose.material3.Scaffold
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.setValue
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import com.example.atividade03.ui.theme.Atividade03Theme

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            pontuacao()
        }
    }
}

@Composable
fun pontuacao() {
    var timeA by remember { mutableStateOf(0) }
    var timeB by remember { mutableStateOf(0) }

    val fundo = Color(0xFF483A58)
    val botao = Color(0xFF56203D)
    val texto = Color.White

    Column(
        modifier = Modifier.fillMaxSize()
            .background(fundo),
        verticalArrangement = Arrangement.Center,
        horizontalAlignment = Alignment.CenterHorizontally
    ) {
        // Time A
        Text(text = "Time A", fontSize = 24.sp)
        Text(text = timeA.toString(), fontSize = 32.sp)

        Card(
            modifier = Modifier
                .size(80.dp)
                .padding(top = 8.dp)
                .clickable { timeA++ },
            shape = CircleShape
        ) {
            Box(modifier = Modifier.fillMaxSize()
                .background(botao),
                contentAlignment = Alignment.Center) {
                Text(text = "Add", color = texto)
            }
        }

        Spacer(modifier = Modifier.height(40.dp))

        Text(text = "Time B", fontSize = 24.sp)
        Text(text = timeB.toString(), fontSize = 32.sp)

        Card(
            modifier = Modifier
                .size(80.dp)
                .padding(top = 8.dp)
                .clickable{ timeB++ },
            shape = CircleShape
        ) {
            Box(modifier = Modifier.fillMaxSize()
                .background(botao),
                contentAlignment = Alignment.Center) {
                Text(text = "Add", color = texto)
            }
        }
    }
}

