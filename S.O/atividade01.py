class Processo:
    def __init__(self, id, chegada, duracao, fim, inicio):
        self.id = id
        self.chegada = chegada
        self.duracao = duracao
        self.fim = fim
        self.inicio = inicio

processos = [
    Processo(0, 1, 5, 0, 0),
    Processo(1, 3, 2, 0, 0),
    Processo(2, 3, 8, 0, 0),
    Processo(3, 6, 13, 0, 0),
]

tempo = 0
fila = []
n = len(processos)

for i in range(n - 1):
    for j in range(i + 1, n):
        if processos[i].chegada > processos[j].chegada:
            processos[i], processos[j] = processos[j], processos[i]

n_processo = 0
processos_total = len(processos)

while n_processo < processos_total:
    if tempo == 0 or tempo < processos[n_processo].chegada:
        tempo = processos[n_processo].chegada
    
    processos[n_processo].inicio = tempo
    processos[n_processo].fim = processos[n_processo].inicio + processos[n_processo].duracao
    tempo = processos[n_processo].fim
    fila.append(processos[n_processo])
    n_processo += 1

for processo in fila:
    print(f"Processo:f {processo.id} - Início: {processo.inicio}, Fim: {processo.fim}")
