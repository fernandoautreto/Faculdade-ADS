# Solicita ao usuário a hora e o minuto de início do jogo
hora_inicio = int(input("Digite a hora de início do jogo: "))
minuto_inicio = int(input("Digite o minuto de início do jogo: "))

# Solicita ao usuário a hora e o minuto de término do jogo
hora_fim = int(input("Digite a hora de término do jogo: "))
minuto_fim = int(input("Digite o minuto de término do jogo: "))

# Calcula a duração em minutos
if hora_fim >= hora_inicio:
    duracao = (hora_fim - hora_inicio) * 60 + (minuto_fim - minuto_inicio)
else:
    duracao = (24 - hora_inicio + hora_fim) * 60 + (minuto_fim - minuto_inicio)

# Converte a duração para horas e minutos
horas = duracao // 60
minutos = duracao % 60

# Exibe a duração do jogo
print(f'O jogo durou {horas} horas e {minutos} minutos.')