nota_trabalho = float(input('Digite a nota que o aluno tirou no trabalho de laboratório: '))
av_semestral = float(input('Digite a nota que o aluno tirou na avaliação semestral: '))
exame_final = float(input('Digite a nota que o aluno tirou no exame final: '))
mp = (nota_trabalho * 2 + av_semestral * 3 + exame_final * 5) / 10
if 8.0 <= mp <= 10:
    print(f'A média foi de {mp:.1f}, e teve um conceito A')
elif 7.0 <= mp < 8.0:
    print(f'A média foi de {mp:.1f}, e teve um conceito B')
elif 6.0 <= mp < 7.0:
    print(f'A média foi de {mp:.1f}, e teve um conceito C')
elif 5.0 <= mp < 6.0:
    print(f'A média foi de {mp:.1f}, e teve um conceito D')
elif 0 <= mp < 5.0:
    print(f'A média foi de {mp:.1f}, e teve um conceito E')