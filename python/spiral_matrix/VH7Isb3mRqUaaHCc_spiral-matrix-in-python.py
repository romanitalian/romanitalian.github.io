#!/usr/bin/env python3
# http://runnable.com/VH7Isb3mRqUaaHCc/spiral-matrix-in-python

def change_direction(dx, dy):
    # not allowed!3
    if abs(dx+dy) != 1:
        raise ValueError
    if dy == 0:
        return dy, dx
    if dx == 0:
        return -dy, dx

def print_spiral(N=5, M=6):
    if N < 0 or M < 0:
        return None

    dx, dy = 1, 0   # direction
    x, y = 0, 0     # coordinate
    start = 0       # initial value for the matrix

    max_digits = len(str(N*M-1))    # for pretty printing

    left_bound, right_bound = 0, N-1
    upper_bound, bottom_bound = 1, M-1

    # zero filled 2d array
    matrix = [[0 for i in range(N)] for j in range(M)]

    for not_use in range(N*M):
        matrix[y][x] = start

        if (dx > 0 and x >= right_bound):
            dx, dy = change_direction(dx, dy)
            right_bound -= 1

        if (dx < 0 and x <= left_bound):
            dx, dy = change_direction(dx, dy)
            left_bound += 1

        if (dy > 0 and y >= bottom_bound):
            dx, dy = change_direction(dx, dy)
            bottom_bound -= 1

        if (dy < 0 and y <= upper_bound):
            dx, dy = change_direction(dx, dy)
            upper_bound += 1

        x += dx
        y += dy
        start += 1

    print('\n'.join([' '.join(['{:0{pad}d}'.format(val, pad=max_digits) for val in row]) for row in matrix]))

if __name__ == '__main__':
    print_spiral()


# def spiral(X, Y):
#     x = y = 0
#     dx = 0
#     dy = -1
#     for i in range(max(X, Y)**2):
#         if (-X/2 < x <= X/2) and (-Y/2 < y <= Y/2):
#             print (x, y)
#             # DO STUFF...
#         if x == y or (x < 0 and x == -y) or (x > 0 and x == 1-y):
#             dx, dy = -dy, dx
#         x, y = x+dx, y+dy
